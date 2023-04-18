<template>
    <div class="flex justify-center mt-5">
        <input type="range" min="1" max="100" class="w-full">
    </div>
</template>

<style scoped>
/*********** Baseline, reset styles ***********/
input[type="range"] {
  -webkit-appearance: none;
  appearance: none;
  background: transparent;
  cursor: pointer;
  width: 275px;
}

/* Removes default focus */
input[type="range"]:focus {
  outline: none;
}

/******** Chrome, Safari, Opera and Edge Chromium styles ********/
/* slider track */
input[type="range"]::-webkit-slider-runnable-track {
  background-color: #fbb056;
  border-radius: 0.5rem;
  height: 3.5px;
}

/* slider thumb */
input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none; /* Override default look */
  appearance: none;
  margin-top: -6.25px; /* Centers thumb on the track */
  background-color: #f9951e;
  border-radius: 0.5rem;
  height: 1rem;
  width: 1rem;
}

input[type="range"]:focus::-webkit-slider-thumb {
  outline: 3px solid #f9951e;
  outline-offset: 0.125rem;
}

/*********** Firefox styles ***********/
/* slider track */
input[type="range"]::-moz-range-track {
  background-color: #fbb056;
  border-radius: 0.5rem;
  height: 3.5px;
}

/* slider thumb */
input[type="range"]::-moz-range-thumb {
  background-color: #f9951e;
  border: none; /*Removes extra border that FF applies*/
  border-radius: 0.5rem;
  height: 1rem;
  width: 1rem;
}

input[type="range"]:focus::-moz-range-thumb{
  outline: 3px solid #f9951e;
  outline-offset: 0.125rem;
}
</style>
