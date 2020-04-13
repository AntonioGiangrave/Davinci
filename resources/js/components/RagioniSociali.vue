<template>
    <div>
        <h1>Ragioni Sociali</h1>

        <b-button
            size="sm"
            class="my-2 my-sm-0"
            type="button"
            
            @click="seed"
        >
            <b-icon icon="cloud-upload" font-scale="1"></b-icon> Populate
            DB</b-button
        >

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
                            class="btn btn-primary"
                            >View</router-link
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { format } from "date-fns";
import http from "../http-common";

export default {
    data() {
        return {
            companies: []
        };
    },
    created() {
        this.fetchCompanies();
    },
    methods: {
        dateFormat(date) {
            return format(new Date(date), "dd/mm/yyyy HH:MM");
        },
        fetchCompanies() {
            const uri = "/aziende";

            http.get(uri).then(response => {
                this.companies = response.data;
            });
        },
        seed() {
            const uri = "/seed";

            http.get(uri).then(response => {
                console.log("seeded");
                this.fetchCompanies();
            });
        }
    }
};
</script>
