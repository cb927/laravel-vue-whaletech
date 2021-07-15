<template>
  <div class="news__item">
    <a :href="link" class="news__item__link">
      <figure class="news__item__img">
        <img :src="img" alt="" />
        <div class="news__item__cat">{{tag}}</div>
      </figure>
      <p class="news__item__date">{{postDateTime}}</p>
      <p class="news__item__title">{{title}}</p>
    </a>
  </div>
</template>
<script>
export default {
  props: {
    img: {
      type: String,
    },
    title: {
      type: String,
    },
    tag: {
      type: String,
    },
    link: {
      type: String,
    },
    postDateTime: {
      type: String,
    }
  },
  mounted() {
    // console.log(this.img);
  },
};
</script>