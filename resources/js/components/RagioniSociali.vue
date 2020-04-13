<template>
    <div>
        <h1>Ragioni Sociali</h1>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ragione Sociale</th>
                    <th>Data creazione</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="company in companies" :key="company.id">
                    <td>{{ company.id }}</td>
                    <td>{{ company.ragioneSociale }}</td>
                    <td>{{ dateFormat(company.created_at) }}</td>
                    <td>
                        <router-link
                            :to="{
                                name: 'voucher',
                                params: { id: company.id }
                            }"
                            variant="dark"
                        >
                            <b-button
                                size="sm"
                                class="my-2 my-sm-0"
                                type="button"
                                variant="dark"
                                @click="seed()"
                            > VIEW
                                <b-icon
                                    icon="reply"
                                    font-scale="1"
                                ></b-icon>
                                </b-button
                            ></router-link
                        >

                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { format } from "date-fns";

export default {
    mounted() {
        this.$store.dispatch("getAllCompanies");
    },
    computed: {
        companies() {
            return this.$store.getters.getCompanies;
        }
    },
    methods: {
        dateFormat(date) {
            return format(new Date(date), "dd/mm/yyyy HH:MM");
        }
    }
};
</script>
