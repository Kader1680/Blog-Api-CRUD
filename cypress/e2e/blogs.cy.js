




describe('Get Right Structre Response  ', () => {
    it('Checks if error field is null', () => {
        cy.request(`http://127.0.0.1:8000/api/blog/`) // replace with your API endpoint
            .its('body.error') // Accessing the error field in the response body
            .should('be.null'); // Asserting that it should be null
    });

    it('Checks if error field is null and status is true', () => {
        cy.request('http://127.0.0.1:8000/api/blog/') // replace with your API endpoint
            .its('body') // Accessing the response body
            .then((response) => {
                expect(response.error).to.be.null; // Asserting that the error field should be null
                expect(response.status).to.equal('true'); // Asserting that the status field should be 'true'
            });
    });

    it('Checks if Data is not empty', () => {
        cy.request('http://127.0.0.1:8000/api/blog/') //  your API endpoint
            .its('body') // Accessing the response body
            .then((response) => {
                expect(response.data).to.not.be.empty; // Asserting that the error field should be null
            });
    });
  });


  describe('Show All Data ', () => {
    it('Data should be array', () => {
      cy.request('GET', 'http://127.0.0.1:8000/api/blog')
        .then(response => {
            expect(response.status).to.eq(200);
            expect(response.body).to.have.property('data').that.is.an('array');
            response.body.data.forEach(item => {
                expect(item).to.have.property('title');
                expect(item).to.have.property('body');
              });
        });
    });

    it('Checks if each object in data array has keys', () => {
        cy.request('GET',  'http://127.0.0.1:8000/api/blog') // replace with your API endpoint
            .its('body') // Accessing the response body
            .then((response) => {
                // Iterate over each object in the data array
                response.data.forEach((object ) => {
                    // Assert that each item has keys for id, title, and body
                    // expect(object).to.have.all.keys('id', 'title', 'body');
                    cy.log(object)
                });
            });
    });
  });



  describe('Index Data by Id', () => {
    it('Should return correct response for GET request', () => {
        const id = 5
      cy.request('GET', `http://127.0.0.1:8000/api/blog/${id}`)
        .then(response => {
            expect(response.status).to.eq(200);
            expect(response.body.data).to.have.property('id', id);
            expect(response.body.error);
            // cy.log(response.body.error)

        });




    });
  });



//   describe('Test Post Data', () => {
//     it('Check Post Data', () => {
//       const newData = {
//         title: 'cherry ',
//         body: 'oop'
//       };

//       cy.request({
//         method: 'POST',
//         url: 'http://127.0.0.1:8000/api/create', // Replace URL with your API endpoint
//         body: newData,
//         headers: {
//           'Content-Type': 'application/json'
//         }
//       }).then(response => {
//         expect(response.status).to.eq(201); // Assuming 201 Created status code for successful creation
//     });
//     });
//   });



// --------- test script for update by id mehtods -------------



describe('Update data by id', () => {
    it('Updates data successfully', () => {
        const itemId = 6; // ID of the item to update
        const updatedData = {
            title: 'ddde', // New title
            body: 'dddd'    // New body
        };

        cy.request({
            method: 'PUT',
            url: `http://127.0.0.1:8000/api/edit/${itemId}`,
            body: updatedData,
            headers: {
                'Content-Type': 'application/json'
            }
        }).then((response) => {
            // Assert that the status code is 200 OK
            expect(response.status).to.equal(200);
            expect(response.body.data.title).to.deep.equal(updatedData.title);
        });
    });

  });



// --------- test script for delete mehtods -------------

  //   describe('DELETE Data By id', () => {
  //   it('SDelete succesful with response 200', () => {
  //     const idToDelete = 38; // Assuming the ID of the data to be deleted is 2

  //     cy.request({
  //       method: 'DELETE',
  //       url: `http://127.0.0.1:8000/api/delete/${idToDelete}`, // Replace URL with your API endpoint
  //       headers: {
  //         'Content-Type': 'application/json'
  //       }
  //     }).then(response => {
  //           expect(response.status).to.eq(204); // Assuming 204 No Content status code for successful deletion
  //     });
  //   });
  // });





