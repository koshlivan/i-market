<template>
    <div>
        <main-banner></main-banner>
        <bad-promises></bad-promises>
        <feature-product></feature-product>
        <fashion-show></fashion-show>
        <week-deals></week-deals>
        <latest-news></latest-news>
        <brand-list></brand-list>
    </div>
</template>

<script>
import Header from './Header';
import MainBanner from "./MainBanner/MainBanner";
import BadPromises from "./Promise/BadPromises";
import FeatureProduct from "./FeaturedProduct/FeatureProduct";
import FashionShow from "./Fashion";
import WeekDeals from "./DealsWeek/WeekDeals";
import BrandList from "./Brands/BrandList";
import LatestNews from "./LatestNews/LatestNews";
export default {
    name: "Home",
    components: {
        LatestNews,
        BrandList,
        WeekDeals,
        FashionShow,
        FeatureProduct,
        BadPromises,
        MainBanner,
        Header
    }
}
</script>

<style scoped>

</style>
