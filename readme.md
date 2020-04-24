### this is a test project - react components with symfony jwt authentication

#### Server project description
Created with docker, using node with phpfpm
#### Backend project description
Created with symfony, jwt component for authentication
#### Frontend project description
Created with react 
### json collection added
File : online-catalog.postman_collection.json

### how it works

#### Backend
All the routes with /api are jwt protected and require token

##### Login user - generate token
POST http://localhost:8080/api/login_check

Body raw
{
	"username":"test@test.com", 
	"password":"test"
}

#### Frontend

#### Versioning
 Versioned with git submodules