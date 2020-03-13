import React from 'react';


class Home extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
          error: null,
          isLoaded: false,  
          users: [],
        };
      }

     componentDidMount() {
            fetch('https://jsonplaceholder.typicode.com/posts')
            .then( (results) => {
                return results.json();
            }).then( 
                (data) =>{
                this.setState({
                    isLoaded: true,
                    users: data
                });           
            },
            (error) =>{
                this.setState({
                    isLoaded: true,
                    error
                });
            }
        )
     }

     render() {
         const { error, isLoaded, users } = this.state;
         if ( error) {
            return <div>Error: {error.message}</div>;
         }else if (!isLoaded) {
             return <div>Loading...</div>;
         }else{

         }
         return (
           <div>
               {users.map(user => ( 

                   <p key={user.id}>{user.title}</p>
               ))}
                
           </div>
              
            

         )
     }


}


export default Home;