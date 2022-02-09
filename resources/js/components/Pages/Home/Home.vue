<template>
    <div>
        <main-banner></main-banner>
        <bad-promises></bad-promises>
        <feature-product></feature-product>
        <fashion-show></fashion-show>
        <week-deals></week-deals>
        <latest-news></latest-news>
        <div class="container">
            <brand-list></brand-list>
        </div>
    </div>
</template>

<script>
import Header from '../../Header/Header';
import MainBanner from "./Attachments/MainBanner";
import BadPromises from "./Attachments/BadPromises";
import FeatureProduct from "../../Common/ProductAppear/FeatureProduct";
import FashionShow from "./Attachments/Fashion";
import WeekDeals from "../../Common/DealsWeek/WeekDeals";
import BrandList from "../../Common/Brands/BrandList";
import LatestNews from "../../Common/LatestNews/LatestNews";

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
