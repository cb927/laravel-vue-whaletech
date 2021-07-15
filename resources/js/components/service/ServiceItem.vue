<template>
  <div class="service__item">
    <figure class="item__img">
      <img :src="'upload/service/' + this.service.img" alt="" />
    </figure>
    <div class="item__content">
      <p class="item__content__title">{{this.service.title}}</p>
      <p class="item__content__detail">
        {{this.service.top}}
      </p>
      <div class="item__content__more">
        <a :href="'/services/' + this.service.id" class="item__content__more">
          VIEW MORE
        </a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    name: 'ServiceItem',
    props: {
        service: {
            type: Object,
        }
    }
}
</script>