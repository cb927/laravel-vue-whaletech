<template>
  <section class="service-custom container">
    <div class="title-underline">カスタマイズ</div>
    <div class="custom__main">
      <div class="custom__text">
        弊社の<span class="yello">「{{this.title}}」は、</span
        >当選の本数はもちろんのこと、様々なカスタマイズも可能です。<br />
        詳しくはお問い合わせください。
      </div>
      <div class="custom__btn">
        <a href="/contact">CONTACT</a>
      </div>
    </div>
  </section>
</template>
<script>
export default {
    name: 'ServiceCustom',
    props: {
        title: {
            type: String,
        }
    }
}
</script>