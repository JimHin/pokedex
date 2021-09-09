<template>
  <ion-page>
    <ion-content :fullscreen="true">
      <ion-row
        v-for="(info, key) in infos"
        :key="key"
        @click="selectItem(key)"
        style="margin-top: 10%"
      >
        <ion-col text-center>
          <div
            class="pokemon_bar"
            :id="'bar-' + info.pok_name"
            style="width: 100%"
          >
            <ion-img
              src="./icons/caret-forward-outline.svg"
              style="width: 15px"
              :id="'arrow-' + info.pok_name"
            ></ion-img>
            {{ info.pok_name }}
          </div>
          <div class="pokemon" :id="'type-' + info.pok_name" hidden>
            <div>
              <ion-img :src="info.pok_image"></ion-img>
            </div>
            <div>
              <p>{{ info.pok_description }}</p>
            </div>
          </div>
        </ion-col>
      </ion-row>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonPage } from "@ionic/vue";
import { defineComponent } from "vue";
import axios from "axios";
export default defineComponent({
  name: "Home",
  data() {
    return {
      infos: {},
    };
  },
  methods: {
    selectItem(i: null) {
      if (i == 0) {
        const cible1 = document.querySelector("#type-Dracaufeu");
        const bar1 = document.querySelector("#bar-Dracaufeu");
        const arrow1 = document.querySelector("#arrow-Dracaufeu");
        if (cible1 && bar1 && arrow1) {
          if (cible1.hasAttribute("hidden")) {
            cible1.removeAttribute("hidden");
            bar1.classList.remove("pokemon_bar");
            bar1.classList.add("pokemon_bar_active");
            arrow1.setAttribute("src", "./icons/caret-down-outline.png");
          } else if (!cible1.hasAttribute("hidden")) {
            cible1.setAttribute("hidden", "");
            bar1.classList.remove("pokemon_bar_active");
            bar1.classList.add("pokemon_bar");
            arrow1.setAttribute("src", "./icons/caret-forward-outline.svg");
          }
        }
      } else if (i == 1) {
        const cible2 = document.querySelector("#type-Pikachu");
        const bar2 = document.querySelector("#bar-Pikachu");
        const arrow2 = document.querySelector("#arrow-Pikachu");
        if (cible2 && bar2 && arrow2) {
          if (cible2.hasAttribute("hidden")) {
            cible2.removeAttribute("hidden");
            bar2.classList.remove("pokemon_bar");
            bar2.classList.add("pokemon_bar_active");
            arrow2.setAttribute("src", "./icons/caret-down-outline.png");
          } else if (!cible2.hasAttribute("hidden")) {
            cible2.setAttribute("hidden", "");
            bar2.classList.remove("pokemon_bar_active");
            bar2.classList.add("pokemon_bar");
            arrow2.setAttribute("src", "./icons/caret-forward-outline.svg");
          }
        }
      }
    },
  },
  mounted() {
    axios
      .get("http://localhost:8888/API_pokedex/pokemons")
      .then((response) => (this.infos = response.data));
  },
  components: {
    IonContent,
    IonPage,
  },
});
</script>

<style scoped>
.pokemon_bar {
  display: flex;
  justify-content: flex-start;
  text-align: center;
  border: 1px solid grey;
  background-color: rgb(211, 209, 209);
  color: black;
  padding: 3%;
}

.pokemon_bar_active {
  display: flex;
  justify-content: flex-start;
  text-align: center;
  border: 1px solid rgb(53, 40, 228);
  background-color: rgb(53, 40, 228);
  color: white;
  padding: 3%;
}
</style>