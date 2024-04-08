


 //  describe('Get All Response Data', () => {
 //        it('Visit SIte', () => {

 //        	const url = 'http://127.0.0.1:8000/'
 //            // cy.request('GET',  'http://127.0.0.1:8000/api/clients')
 //            cy.visit(url)
 //        });

 //        it('get response correctly', ()=>{
 //        	cy.request('GET','http://127.0.0.1:8000/api/clients')
 //        	.then(response=>{
 //        		cy.log(response.body.data)
 //        	})
 //        })
 //  });


 //  describe('Get All Clients', () => {
 //        it('Response Should Be An  Array', ()=>{
 //        	cy.request('GET','http://127.0.0.1:8000/api/clients')
 //        	.then(response=>{
 //        		cy.log(response.body.data)
 //        	})
 //        })

 //        it('Data count should be bigest then 1', ()=>{
 //        	cy.request('GET','http://127.0.0.1:8000/api/clients')
 //        	.then(response=>{
 //        		let clientList = response.body.data
 //        		let lengthClientData = clientList.length
 //        		cy.expect(lengthClientData > 50)


 //        		// cy.log(response.body.data)

 //        	// 		clientList.forEach(element => {
 //        	// 			cy.log(element)
// 			// 		});
 //        	})
 //        })
 //  });


 // describe('Data Counter', () => {
 
 //        it('Data count should be bigest then 1', ()=>{
 //        	cy.request('GET','http://127.0.0.1:8000/api/clients')
 //        	.then(response=>{
 //        		let clientList = response.body.data
 //        		let lengthClientData = clientList.length
 //        		// if lengthClientData > 50 ? cy.log("larger") : cy.log("smaller")
 //        		cy.expect(lengthClientData > 50)
 //        		cy.log(lengthClientData)
 //        	})
 //        })
 //  });
 

 // describe('Testing Structre Response', () => {
 
 //        it('Satus Code Should Be 200', ()=>{
 //        	cy.request('GET','http://127.0.0.1:8000/api/clients')
 //        	.then(response=>{
 //        		let clientList = response.body.status
        		
 //        		cy.expect(clientList)
 //        	})
 //        })

 //        it('Error Should Be Array Empty', ()=>{
 //        	cy.request('GET','http://127.0.0.1:8000/api/clients')
 //        	.then(response=>{
 //        		let clientList = response.body.error
        		
 //        		cy.log(typeof(clientList))
 //        	})
 //        })
 //  });



//---------------------------------------------------------------------------------------

//  describe('Testing Post Methods', () => {
//        it('Post Data with succsess', ()=>{ 
//              // const resauestBody = {
//         	// 	"title" : "testing",
//               //        // you can make random 
//               //        // "id" : Math.random().toString(4).substring(3)
//         	// 	"body" : "testing",
//         	// }
//               cy.fixture("post").then((post)=>{
//                      const requestBody = post
//                      cy.request(
//                      {
//                             method: 'Post',
//                             url: 'http://127.0.0.1:8000/api/create', 
//                             body: requestBody
//                      }
//               )
//               .then((response)=>{
//                      expect(response.body.data.title).to.eq('testing')
//                      expect(response.body.status).to.eq(201)
//                      expect(response.body.data).has.property('title', requestBody.title)
//               }
//               )
//               })        	
//        })
// });



//---------------------------------------------------------------------------------------



//  describe('Testing Update Methods', () => {
//        it('Update Data with succsess', ()=>{ 
//               const id = 32
//               cy.fixture("post").then((post)=>{
//                      const requestBody = post
//                      cy.request(
//                      {
//                             method: 'Put',
//                             url: `http://127.0.0.1:8000/api/edit/${id}`, 
//                             body: requestBody
//                      }
//               )
//               .then((response)=>{
//                      expect(response.body.status).to.eq(200)
//                      expect(response.body.data).has.property('title', requestBody.title)
//               }
//               )
//               })         
//        })
// });


//---------------------------------------------------------------------------------------

//  describe('Testing Delete Methods', () => {
//        it('Update Data with succsess', ()=>{ 
//               const id = 69
//               cy.fixture("post").then((post)=>{
//                      const requestBody = post
//                      cy.request(
//                      {
//                             method: 'Delete',
//                             url: `http://127.0.0.1:8000/api/delete/${id}`, 
//                      }
//               )
//               .then((response)=>{
//                      expect(response.status).to.eq(204)
//               }
//               )
//               })         
//        })
// });



 
  describe('Testing Query Paramter', () => {
       it('Passing Query Paramter', ()=>{ 
             

             cy.request("Get", "http://127.0.0.1:8000/blog"
              
             )
             .then((response)=>{
                     expect(response.status).to.eql(200)
                     expect(response.body).to.have.property('data').that.is.an('array');

                     // expect(response.data).that.is.an('array')
                     // cy.log(response.data)
                     // expect(response.data).that.is.an('array');

             })     
       })
});


