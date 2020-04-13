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
                            :to="{ name: 'voucher', params: { id: company.id } }"
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
import { format } from 'date-fns'
export default {
    data() {
        return {
            companies: []
        };
    },
    created() {
        let uri = "http://localhost:8000/api/aziende";
        this.axios.get(uri).then(response => {
            this.companies = response.data;
        });
    },
    methods: {
        deletePost(id) {
            let uri = `http://localhost:8000/api/post/delete/${id}`;
            this.axios.delete(uri).then(response => {
                this.posts.splice(this.posts.indexOf(id), 1);
            });
        },
        dateFormat(date ){
            return  format(new Date(date), 'dd/mm/yyyy HH:MM');
        }
    }
};
</script>
