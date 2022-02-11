<template>
    <div class="paginator">
        <a href="#" @click.prevent="clickPrev"
           :class="{inactive : currentPage === 1}">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a href="#" v-show="isMany" v-for="(index) in showed"
           @click.prevent="$emit('pagePicked', pages.start + index)"
           :class="{active : index + pages.start === currentPage}">
            {{ pages.start + index }}
        </a>

        <a href="#" v-show="!isMany" v-for="index in amount"
           @click.prevent="$emit('pagePicked', index)"
           :class="{active : index=== currentPage}">
            {{ index }}
        </a>

        <a href="#" @click.prevent="clickNext"
           :class="{inactive : currentPage === amount}">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>

</template>

<script>
export default {
    name: "paginator-the",
    props: [
        'amount',
        'currentPage'
    ],
    emits: [
        'pagePicked',
        'next'
    ],
    data() {
      return {
          pages: {
              start: 0,
          }
      }
    },
    watch: {
        currentPage : function() {
            if (this.amount > 10 && this.currentPage > 9) {
                if ( this.currentPage <= this.amount - 5) {
                    this.pages.start = this.currentPage - 4;
                } else {
                    this.pages.start = this.amount - 9;
                }
            } else {
                this.pages.start = 0;
            }
        }
    },
    computed: {
      showed() {
          if (this.amount > 10) {
              return 9;
          }
          return this.amount;
      },
        isMany() {
            if (this.amount > 10) {
                return true;
            }
            return false;
        }
    },
    methods: {
        clickNext() {
            if (this.currentPage < this.amount) {
                this.$emit('next', true);
            }
        },
        clickPrev() {
            if (this.currentPage > 1) {
                this.$emit('next', false);
            }
        },
    }
}
</script>

<style scoped>
.paginator {
    width: 100%;
    height: 2.5rem;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-content: stretch;
    margin: 1rem 0;
}

a {
    text-decoration: none;
    padding: 0.5rem 1rem;
    background-color: white;
    color: rgb(66, 66, 66);
    margin: 0 0.2rem;
    border-radius: 2px;
}

a:hover {
    color: white;
    background-color: #fa4251;
    cursor: pointer;
}

a:active {
    color: #a88f8f;
    background-color: #951b25;
}

a i {
    vertical-align: middle;
}

.inactive {
    color: rgb(200, 200, 200);
    cursor: default;
}

.active {
    background-color: #fa4251;
    color: white;
    cursor: default;
}

.active:hover {
    background-color: #fa4251;
    color: white;
    cursor: default;
}
</style>
