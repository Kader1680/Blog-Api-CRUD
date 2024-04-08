 describe('Testing Query Paramter', () => {
       it('Passing Query Paramter', ()=>{ 
             

             cy.request({
             	method : "get",
             	url: "http://127.0.0.1:8000/blog",
             	qs : {id:30}
             })
             .then((response)=>{
             	expect(response.status).to.eql(200)
             })     
       })
});
