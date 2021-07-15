<template>
  <div class="work__intro">
    <figure class="intro__img">
      <img :src="'/upload/work/' + this.work.img" alt="" />
    </figure>
    <p class="intro__title">{{ this.work.title }}</p>
    <div class="intro__categories">
      <span
        class="intro__category"
        v-for="(category, i) in categoryList"
        :key="i"
        >{{ category }}</span
      >
    </div>
  </div>
  <div class="work__detail">
    <div class="detail__item">
      <div class="item__name">リリース日</div>
      <div class="item__content">{{ this.postDate }}</div>
    </div>
    <div class="detail__item">
      <div class="item__name">案件種別</div>
      <div class="item__content">{{ this.work.item_type }}</div>
    </div>
    <div class="detail__item">
      <div class="item__name">言語</div>
      <div class="item__content">{{ this.work.language }}</div>
    </div>
    <div class="detail__item">
      <div class="item__name">タイプ</div>
      <div class="item__content">
        {{ this.work.type }}
      </div>
    </div>
    <div class="detail__item">
      <div class="item__name">概要</div>
      <div class="item__content" v-html="work.overview"></div>
    </div>
  </div>
</template>
<script>
export default {
  name: "WorkIntro",
  props: {
    work: {
      type: Object,
    },
    postDate: {
      type: String,
    },
  },
  data() {
    return {
      categoryList: Array,
    };
  },
  mounted() {
    this.categoryList = this.work.tags.split(",");
    console.log(this.postDate);
  },
};
</script>