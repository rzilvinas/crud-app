<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category View</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="category.title" readonly>
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" v-model="category.description" readonly>
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" v-model="category.slug" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <router-link :to='{name:"categoryEdit", params:{id:category.id}}' class="btn btn-success">Edit</router-link>
                            <router-link :to='{name:"categoryList"}' class="btn btn-primary">Back</router-link>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"view-category",
    data(){
        return {
            category:{
                title:"",
                description:"",
                slug:"",
                id:""
            }
        }
    },
    mounted(){
        this.showCategory()
    },
    methods:{
        async showCategory(){
            await this.axios.get(`/api/category/${this.$route.params.id}`).then(response=>{
                const { title, description, slug, id } = response.data
                this.category.title = title
                this.category.description = description
                this.category.slug = slug
                this.category.id = id
            }).catch(error=>{
                console.log(error)
            })
        },
    }
}
</script>