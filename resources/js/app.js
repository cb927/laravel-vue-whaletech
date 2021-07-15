require("./bootstrap");

import { createApp } from "vue";
import Banner from "./components/Banner.vue";
import Breadcrumb from "./components/Breadcrumb.vue";
import NewsItem from "./components/blog/NewsItem.vue";
import WorksItem from "./components/work/WorksItem.vue";
import WorkIntro from "./components/work/WorkIntro.vue";
import ServiceItem from "./components/service/ServiceItem.vue";
import ServiceOverview from "./components/service/ServiceOverview.vue";
import ServiceCustom from "./components/service/ServiceCustom.vue";
import ContactSection from "./components/ContactSection.vue";
import Recruit from "./components/Recruit.vue";
import Company from "./components/Company.vue";

const app = createApp({
  components: {
    Banner,
    Breadcrumb,
    NewsItem,
    WorksItem,
    WorkIntro,
    ServiceItem,
    ServiceOverview,
    ServiceCustom,
    ContactSection,
    Recruit,
    Company
  }
});

app.mount("#app");