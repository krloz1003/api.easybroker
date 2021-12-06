<template>
<div class="container"> 
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col" v-for="(row,index) in data.content" :key="row.public_id">
            <div class="card shadow-sm">
            <img :src="row.title_image_thumb">

            <div class="card-body">
                <p><strong>Localtion:</strong> <span>{{ row.location }}</span></p>
                <p><strong>Bathrooms:</strong> <span>{{ row.bathrooms }}</span></p>
                <p><strong>Bedrooms:</strong> <span>{{ row.bathrooms }}</span></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Vista</font>
                            </font>
                        </button>
                    </div>
                    <small class="text-muted" v-for="(price) in row.operations">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">{{ price.formatted_amount }}</font>
                        </font>
                    </small>
            </div>
            </div>
            </div>
        </div>        
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
</template>

<script>
    import PropertieService from './../services/PropertieService'
    export default {
        mounted() {
            this.getData();
        },
        data: () => ({            
            content:  [],
            pagination: {
                page: 1,
                limit: 20,                
                //total: 0,
            }
        }),
        methods: {
            getData(){
                PropertieService.getPropierties().
                then( (res) => {
                    this.data = res.data.content;
                    this.pagination.limit = res.data.pagination.limit;
                    this.pagination.page = res.data.pagination.page;
                    this.pagination.total = res.data.pagination.total;
                })
            },


        }
    }
</script>
