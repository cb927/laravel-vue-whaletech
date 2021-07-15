<template>
  <section class="service-overview container">
    <div class="title-underline">「{{ this.service.title }}」サービス概要</div>
    <div class="overview__content">
      <div class="overview__content__top">
        {{ this.service.top }}
      </div>
      <div class="overview__content__main">
        <figure class="overview__content__main__img">
          <img :src="'/upload/service/' + this.service.img" alt="" />
        </figure>
        <p class="overview__content__main__text">
          {{ this.service.main }}
        </p>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  name: "ServiceOverview",
  props: {
    service: {
      type: Object,
    },
  },
  mounted() {
    console.log(this.service);
  },
};
</script>