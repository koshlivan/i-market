<template>
    <div class="holder">
        <navigator>our creative team</navigator>
        <div class="swiper">
            <div class="team-card-keeper" ref="line">
                <employee-card v-for="(employee, index) in employees"
                               :key="index"
                               :employee="employee"
                               @lineMove="moveTeam($event)">
                </employee-card>
            </div>
        </div>
    </div>
</template>

<script>
import Navigator from "../Navigator";
import EmployeeCard from "../TeamCard/EmployeeCard";
export default {
    name: "Team",
    components: {EmployeeCard, Navigator},
    data(){
        return {
            employees: [
                {image : 'assets/Team/tm5.jpg',
                 prophecy : 'developer',
                 name : 'snezhana',
                 about : '100 projects behind, 5+ is average grade',
                 socials : [
                    { sign : '<i class="fab fa-facebook"></i>', link : 'http://www.facebook.com'},
                    { sign : '<i class="fab fa-pinterest-square"></i>', link : 'http://www.pinterest.com'},
                    { sign : '<i class="fab fa-linkedin-in"></i>', link : 'http://www.linkedin.com'}
                 ]
                },
                {image : 'assets/Team/tm4.jpg',
                    prophecy : 'manager',
                    name : 'elvira',
                    about : 'over 1k projects behind, 5+ is average grade',
                    socials : [
                        { sign : '<i class="fab fa-facebook"></i>', link : 'http://www.facebook.com'},
                        { sign : '<i class="fab fa-pinterest-square"></i>', link : 'http://www.instagram.com'},
                        { sign : '<i class="fab fa-linkedin-in"></i>', link : 'http://www.linkedin.com'}
                    ]
                },
                {image : 'assets/Team/tm3.jpg',
                    prophecy : 'boss',
                    name : 'suzanna',
                    about : 'less 10 projects behind, 5+ is average grade',
                    socials : [
                        { sign : '<i class="fab fa-facebook"></i>', link : 'http://www.facebook.com'},
                        { sign : '<i class="fab fa-pinterest-square"></i>', link : 'http://www.instagram.com'},
                        { sign : '<i class="fab fa-linkedin-in"></i>', link : 'http://www.linkedin.com'}
                    ]
                },
                {image : 'assets/Team/tm2.jpg',
                    prophecy : 'designer',
                    name : 'enrique',
                    about : 'over 1k projects behind, 5+ is average grade',
                    socials : [
                        { sign : '<i class="fab fa-facebook"></i>', link : 'http://www.facebook.com'},
                        { sign : '<i class="fab fa-pinterest-square"></i>', link : 'http://www.instagram.com'},
                    ]
                },
                {image : 'assets/Team/tm1.jpg',
                    prophecy : 'developer',
                    name : 'sebastian',
                    about : 'over 1k projects behind, 5+ is average grade',
                    socials : [
                        { sign : '<i class="fab fa-facebook"></i>', link : 'http://www.facebook.com'},
                        { sign : '<i class="fab fa-linkedin-in"></i>', link : 'http://www.linkedin.com'}
                    ]
                },
            ]
        }
    },
    methods: {
        moveTeam(event){
            if (event) {
                this.line.style.transform='translate-x(40px)';
            }
            if (!event) {
                this.line.style.transform='translate-x(-40px)';
            }
        }
    }
}
</script>

<style scoped>
    .swiper {
        overflow-x: hidden;
        width: 100%;
        height: 100%;
    }
    .team-card-keeper {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: stretch;
        transition: 500ms;
    }
</style>
