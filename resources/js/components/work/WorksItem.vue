<template>
  <div class="works__item">
    <a :href="'works/' + work.id" class="works__item__link">
      <figure class="works__item__img">
        <img :src="'/upload/work/' + work.img" alt="" />
      </figure>
      <p class="works__item__title">{{ work.title }}</p>
      <div class="works__item__categories">
        <span
          class="works__item__category"
          v-for="(category, i) in categoryList"
          :key="i"
          >{{ category }}</span
        >
      </div>
    </a>
  </div>
</template>
<script>
export default {
  props: {
    work: {
      type: Object,
    },
  },
  data() {
    return {
      categoryList: Array,
    };
  },
  mounted() {
    this.categoryList = this.work.tags.split(",");
    //   console.log(data, 'data list')
    //   data.split(',')
  },
};
</script>