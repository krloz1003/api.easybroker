<template>
<div class="container px-4 py-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="pb-2 border-bottom">Propiedades</h2>
        </div>
        <div class="col-md-6">
            <nav aria-label="Page navigation example float-end">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="javascript:;" aria-label="Previous" @click.prevent="previous()">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>            
                    <li class="page-item active"><a class="page-link" href="javascript:;">{{ pagination.page }}</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:;" v-show="pagination.page < last_page">...</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:;" v-show="pagination.page < last_page">{{ last_page }}</a></li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:;" aria-label="Next" @click.prevent="next()">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>        
        </div>
    </div>

    <div class="container">
        <div class="spinner-grow" role="status" v-if="loading">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" v-else>
            <div class="col" v-for="(row) in content" :key="row.public_id">
                <div class="card shadow-sm">
                <img :src="row.title_image_thumb">

                <div class="card-body">
                    <p><strong>Localización:</strong> <span>{{ row.location }}</span></p>
                    <p><strong>Baños:</strong> <span>{{ row.bathrooms }}</span></p>
                    <p><strong>Dormitorios:</strong> <span>{{ row.bathrooms }}</span></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Detalle</font>
                                </font>
                            </button>
                        </div>
                        <small class="text-muted" v-for="(price, index) in row.operations" :key="index">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ price.formatted_amount }}</font>
                            </font>
                        </small>
                </div>
                </div>
                </div>
            </div>        
        </div>
    </div>
</div>
</template>

<script>
    import PropertieService from './../services/PropertieService'
    export default {
        mounted() {
            this.getData();
        },
        data: () => ({
            loading: false,
            content: [],
            pagination: {
                page: 1,
                limit: 20,
            },
            total: 0
        }),
        computed: {
            /**
             * Calculate the last page.
             */
            last_page() {
                return  (this.total)? (this.total / this.pagination.limit|0) : 0;
            }
        },
        methods: {            
            /**
             * Request the properties according to the paging parameters
             * @page Current page
             * @total Total pages
             * @limit Records per page
             * 
             */
            getData(){
                this.loading = true;
                PropertieService.getPropierties(this.pagination).
                then( (res) => {
                    this.content    = res.data.content;
                    this.total      = res.data.pagination.total;
                    this.loading    = false;
                })
            },
            /**
             * Go to the previous page
             */
            previous(){
                this.pagination.page = (this.pagination.page <= 1)? 1 : this.pagination.page - 1 ;
                this.getData();
            },
            /**
             * Go to the next page
             */
            next(){
                this.pagination.page = (this.pagination.page >= this.last_page)? this.last_page : this.pagination.page + 1 ;
                this.getData();
            }


        }
    }
</script>
