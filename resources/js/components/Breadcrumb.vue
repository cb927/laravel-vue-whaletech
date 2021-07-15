<template>
  <section :class="'breadcrumb ' + this.container">
    <img src="assets/img/home.png" class="breadcrumb__home" alt="" />
    <ol class="arrows">
      <li><a href="/">ホーム</a></li>
      <li><a href="#">{{this.name}}</a></li>
      <li v-if="this.subname"><a href="#">{{this.subname}}</a></li>
    </ol>
  </section>
</template>
<script>
export default {
    name: 'Breadcrumb',
    props: {
        container: {
            type: String,
        },
        name: {
            type: String,
        },
        subname: {
            type: String,
        }
    },
    mounted() {
        // console.log(this.name)
    }
}
</script>