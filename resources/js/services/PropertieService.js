class PropertieService {
    
    getPropierties(){
        return axios.get(`${routeBase}/api/properties` );
    }
}

export default new PropertieService();
