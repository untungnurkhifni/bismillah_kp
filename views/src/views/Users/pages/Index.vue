<template>
    <div>
    <v-layout row wrap>
      <v-flex v-for="i in 2" :key="`6${i}`" sm6>
        <v-card>
          <v-card-text class="px-5 py-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque quisquam sint culpa ullam doloribus voluptas inventore eos beatae maiores. Explicabo inventore eum fugiat! Totam, voluptatibus et neque magnam ratione eum.</v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
    </div>
</template>
