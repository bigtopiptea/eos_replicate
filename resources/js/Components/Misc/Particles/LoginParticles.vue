<script setup>
import { ParticlesComponent } from "vue3-particles";
import { loadFull } from "tsparticles";

const particlesInit = async engine => {
    await loadFull(engine);
};

const particlesLoaded = async container => {
    console.log("Particles container loaded", container);
}
</script>

<template>
    <ParticlesComponent id="tsparticles" :particlesInit="particlesInit" :particlesLoaded="particlesLoaded" :options="{
        background: {
            color: {
                value: 'background: linear-gradient(126deg, #EE3E2C 33.28%, #F98B38 61.25%, #FB9E30 89.37%, #FFFFFF 115.09%);'
            }
        },
        style: {
            position: 'fixed',
            left: '700px',
            top: '100px'
        },
        fpsLimit: 120,
        interactivity: {
            modes: {
                bubble: {
                    distance: 400,
                    duration: 2,
                    opacity: 0.8,
                    size: 40
                },
                push: {
                    quantity: 4
                },
                repulse: {
                    distance: 200,
                    duration: 0.4
                }
            }
        },
        particles: {
            color: {
                value: '#ffffff'
            },
            links: {
                color: '#ffffff',
                distance: 180,
                enable: true,
                opacity: 0.5,
                width: 1
            },
            move: {
                enable: true,
                speed: 2,
            },
            number: {
                density: {
                    enable: true,
                    area: 800
                },
                value: 80
            },
            opacity: {
                value: 0.4
            },
            shape: {
                type: 'circle'
            },
            size: {
                value: { min: 1, max: 5 },
            }
        },
        detectRetina: true
    }" />

</template>
