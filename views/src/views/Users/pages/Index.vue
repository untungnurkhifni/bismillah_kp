<template>
  <div>
    <v-layout row wrap>
      <v-flex sm12>
        <v-card dark class="blue-grey darken-4">
          <v-card-text class="px-5 py-5">
            <v-sparkline
              :value="value"
              color="rgba(255, 255, 255, .7)"
              height="100"
              padding="10"
              line-width="2"
              stroke-linecap="round"
              smooth
            >
              <template v-slot:label="item">{{ item.value }}</template>
            </v-sparkline>
          </v-card-text>
        </v-card>
      </v-flex>
      <v-flex sm6>
        <v-card>
          <v-card-text
            class="px-5 py-5"
          >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque quisquam sint culpa ullam doloribus voluptas inventore eos beatae maiores. Explicabo inventore eum fugiat! Totam, voluptatibus et neque magnam ratione eum.</v-card-text>
        </v-card>
      </v-flex>
      <v-flex sm6>
        <v-card>
          <v-card-text
            class="px-5 py-5"
          >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque quisquam sint culpa ullam doloribus voluptas inventore eos beatae maiores. Explicabo inventore eum fugiat! Totam, voluptatibus et neque magnam ratione eum.</v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
  </div>
</template>

<script>
export default {
  data: () => ({
    value: [1, 7, 10, 0, 0, 4, 2]
  })
};
</script>
