<template>
  <section class="banner bg-blue-gradient" v-if="this.title">
    <div class="container-800">
      <p class="banner__title" v-if="this.title">{{ title }}</p>
      <p class="banner__subtitle" v-if="this.subtitle">{{ subtitle }}</p>
    </div>
  </section>
  <section class="banner bg-blue-gradient text-left" v-else>
    <div class="container-800">
      <div class="banner__categories" v-if="this.tags">
        <span
          class="banner__category"
          v-for="(tag, i) in this.tags"
          :key="i"
        >{{tag}}</span>
      </div>
      <p class="banner__subtitle" v-if="this.subtitle">{{ subtitle }}</p>
      <p class="banner__date" v-if="this.postDate">{{ postDate }}</p>
    </div>
  </section>
</template>
<script>
export default {
  name: "Banner",
  props: {
    title: {
      type: String,
    },
    subtitle: {
      type: String,
    },
    postDate: {
      type: String,
    },
    tags: {
      type: Array,
    },
  },
  mounted() {
    // console.log(this.title)
  },
};
</script>