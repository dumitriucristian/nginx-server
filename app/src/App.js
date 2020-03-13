import React from 'react';
import logo from './svg/book.svg';
import { BrowserRouter, Route, NavLink } from "react-router-dom";
import Classes from './components/school/Classes.js';
import Students from './components/school/Students.js';
import Home from './components/school/Home.js';
import Cards from './components/Cards.js';

function App() {

  return (
    <div className="App">
       <BrowserRouter>
          <header className="grid grid-cols-1 sm:grid-cols-2">    
            <div className="flex align-middle"><img src={logo} className="h-12 p-1"></img>Bucharest Hi School
            </div>
              <div className="flex flex-wrap mr-5">
                <NavLink to="/classes"   className="w-full sm:w-1/4 text-center sm:text-right p-2" href="#" >School Classes </NavLink>
                <NavLink to="/students" className="w-full sm:w-1/4 text-center sm:text-right p-2" href="#">School Students</NavLink>
                <NavLink to="/statistics" className="w-full sm:w-1/4 text-center sm:text-right p-2" href="#">School statistics</NavLink>
                <NavLink to="/personel" className="w-full sm:w-1/4 text-center sm:text-right p-2" href="#">School Personel</NavLink>
              </div>               
          </header>
          <div className="flex w-full flex-wrap justify-center my-10">
            <Route exact path="/" component={Home} />
            <Route path="/classes" component={Classes} /> 
            <Route path="/students" component={Students} />
          </div>
         
        </BrowserRouter>
    </div>
  );
}

export default App;