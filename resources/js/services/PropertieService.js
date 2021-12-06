class PropertieService {
    
    getPropierties(params){
        return axios.get(`/api/properties`, { params: params } );
    }
}

export default new PropertieService();
