<template>
    <v-app>
      <v-container>
        <v-autocomplete
          :items="options.label"
          variant="outlined"
        ></v-autocomplete>
      </v-container>
    </v-app>
  </template>


<script>

export default {

    props:{

        options:{
            type:Array,
            default:[],
        }
    }

}
</script>
