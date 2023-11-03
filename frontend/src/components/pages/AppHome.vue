<!-- pagina home -->
<script>
import { store } from '../../data/store';
import AppJumbotron from '../partials/AppJumbotron.vue';
import AppCard from '../partials/AppCard.vue';
import SelectSpecialization from '../partials/Specializations.vue';
import SearchBar from '../partials/Search.vue';
import axios from 'axios';

export default {
    name: "AppHome",
    components: {
        AppJumbotron,
        AppCard,
        SelectSpecialization,
        SearchBar,
        },
    data() {
        return {
            store,
        }
    },
    methods: {
        getData() {
            axios.get(this.store.apiBaseUrl + this.store.apiUrls.doctors)
                .then((response) => {
                    this.store.doctors = response.data.results.doctors
                    console.log(this.store.doctors);
                    this.store.specializations = response.data.results.specializations
                }
                )
        },
        search() {
            if (this.store.searchBarText.trim() !== '' && this.store.selectedSpecializations.length > 0) {
                return this.store.doctors.filter((doc) => {
                    if (this.store.selectedSpecializations.every((cat) => doc.specializations.map(specializations => specializations.id).includes(cat))) {
                        return doc
                    }
                }).filter(doc => doc.name.toLowerCase().includes(this.store.searchBarText.toLowerCase()))
            } else if (this.store.searchBarText.trim() !== '') {
                return this.store.doctors.filter(doc => doc.name.toLowerCase().includes(this.store.searchBarText.toLowerCase()))
            } else if (this.store.selectedSpecializations.length > 0) {
                return this.store.doctors.filter((doc) => {
                    if (this.store.selectedSpecializations.every((cat) => doc.specializations.map(specializations => specializations.id).includes(cat))) {
                        return doc
                    }
                })
            } else {
                return this.store.doctors
            }
        },
    },
    created() {
        this.getData();
    }
}   
</script>


<template>
        <AppJumbotron></AppJumbotron>
    <main class="pt-5">
        <section class="pb-4 d-flex flex-column flex-sm-row mt-2 container-md container-fluid mx-auto">
            <!-- Ricerca Specializzazioni -->
            <div class="specialization col-sm-4 col-md-3 d-md-fle">
                <SelectSpecialization @search="search" />
            </div>


            <div class="doctors col-sm-8 col-md-9 ms-0">
                <div class="mx-3 ms-md-5 d-flex justify-content-center">
                    <div class="titles">
                        <h3 class="fw-bold f-3 mb-3">Elenco dottori</h3>
                        <p class="fs-5 mb-0 ps-sm-0 ps-3">Lista dottori</p>
                    </div>
                </div>
                <div class="ms_cards mt-4 d-flex gap-5 flex-wrap justify-content-center align-content-start">
                    <AppCard v-for="doctor in search()" :data="doctor" />

                </div>
            </div>
        </section>
        <!--/Sezione dottori -->
    </main>
</template>

<style  lang="scss" scoped>
.ms_cards {
    padding-top: 20px;
}

.titles{
    h3{
        text-align: center;
    }
    p{
        text-align: center;
    }
}

@media (max-width: 768px) {
    .appCarousel {
        display: none;
    }
    
}


@media (max-width: 540px) {

    .doctors {
        transform: translate(0, -65px);

    }

    .titles{
    h3{
        text-align: start;
    }
    p{
        text-align: start;
        padding: 0 !important;
    }
}

    .ms_cards {
        justify-content: center;
        padding-top: 0;

    }

    .category {
        padding-right: 0;
    }

    .ms-md-5{
        justify-content: flex-start !important;
    }
}
</style>