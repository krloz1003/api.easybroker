class PropertieService {
    
    getPropierties(params){
        return axios.get(`/api/properties` );
    }
}

export default new PropertieService();
