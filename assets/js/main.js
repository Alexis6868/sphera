import * as THREE from 'https://cdn.skypack.dev/three@0.129.0/build/three.module.js';
import { OrbitControls } from 'https://cdn.skypack.dev/three@0.129.0/examples/jsm/controls/OrbitControls.js';
import { GLTFLoader } from 'https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js';

// Initialisation de la scène, de la caméra et du rendu
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(
  50, // Angle de champ (Field of View)
  window.innerHeight / 1.4 / window.innerHeight, // Aspect ratio basé sur la taille de la fenêtre
  0.1, // Distance minimale de la caméra
  1000 // Distance maximale de la caméra
);
camera.position.z = 4; // Position de la caméra ajustée

const renderer = new THREE.WebGLRenderer({ alpha: true });
renderer.setSize(window.innerHeight / 1.4, window.innerHeight); // Le canvas occupe toute la fenêtre
document.getElementById("container3D").appendChild(renderer.domElement);

// Ajout de lumières
const light = new THREE.DirectionalLight(0xffffff, 4);
light.position.set(20, 20, 20);
scene.add(light);
const light2 = new THREE.DirectionalLight(0x0073e6, 4);
light2.position.set(-20, 10, -20);
scene.add(light2);

// Chargement du modèle 3D avec l'URL dynamique
const loader = new GLTFLoader();
let object;

loader.load(
  themeData.gltf_model_url,  // Utilisation de l'URL envoyée via wp_localize_script
  (gltf) => {
    object = gltf.scene;
    object.scale.set(0.04, 0.04, 0.04);
    object.position.set(0, -0.2, -0.2);
    scene.add(object);
  },
  undefined,
  (error) => console.error(error)
);

// Contrôles pour la prise de contrôle par l'utilisateur
const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true; // Donne un effet d'inertie
controls.enableZoom = false;

// Variable pour activer/désactiver la rotation automatique
let isUserInteracting = false;

// Écouteurs pour gérer le clic enfoncé dans le canvas
renderer.domElement.addEventListener("mousedown", () => {
  isUserInteracting = true;
});
renderer.domElement.addEventListener("mouseup", () => {
  isUserInteracting = false;
});

// Animation de la scène
function animate() {
  requestAnimationFrame(animate);

  // Fait tourner l'objet automatiquement si l'utilisateur n'interagit pas
  if (object && !isUserInteracting) {
    object.rotation.y += 0.001; // Rotation automatique plus lente autour de l'axe Y
  }

  controls.update();
  renderer.render(scene, camera);
}

animate();
