import React from 'react';
import trash from '../../svg/trash.svg';
import viewShow from '../../svg/view-show.svg';

class Students extends React.Component {

    render() {
        return(
            <div>
              <table clasName=".table-auto bg-transparent">
                  <thead className="uppercase bg-blue-400 text-gray-200 font-bold">
                      <tr>
                          <th>Name</th>
                          <th>Class</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                        <tr className="text-center font-medium bg-gray-500 text-white  hover:bg-blue-700 py-1" >
                          <td className="px-2 w-48 text-left border-t-2 border-b-2">John Doe</td>
                          <td className="w-40 border-t-2 border-b-2">8-tg Grade</td>
                          <td className="p-2  w-40 border-t-2 border-b-2">Status</td>
                          <td className="bg-gray-100 border-t-0 border-b-0">                    
                            <div className="bg-blue-500 px-5 py-1 rounded-lg shadow-md cursor-pointer hover:bg-blue-700 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                className="fill-current text-white h-5">
                                <path d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                                </svg>
                            </div>
                            
                            </td>
                            <td className="bg-gray-100 border-t-0 border-b-0">
                            <div className="bg-orange-500 px-5 py-1 rounded-lg shadow-md cursor-pointer hover:bg-orange-700">
                              <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                className="fill-current text-white h-5"
                                viewBox="0 0 20 20">
                                    <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/>
                            </svg>
                            </div>
                          </td>
                      </tr>

                      <tr className="text-center font-medium bg-gray-500 text-white  hover:bg-blue-700 py-1" >
                          <td className="px-2 w-48 text-left border-t-2 border-b-2">John Doe</td>
                          <td className="w-40 border-t-2 border-b-2">8-tg Grade</td>
                          <td className="p-2  w-40 border-t-2 border-b-2">Status</td>
                          <td className="bg-gray-100 border-t-0 border-b-0">                    
                            <div className="bg-blue-500 px-5 py-1 rounded-lg shadow-md cursor-pointer hover:bg-blue-700 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                className="fill-current text-white h-5">
                                <path d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                                </svg>
                            </div>
                            
                            </td>
                            <td className="bg-gray-100 border-t-0 border-b-0">
                            <div className="bg-orange-500 px-5 py-1 rounded-lg shadow-md cursor-pointer hover:bg-orange-700">
                              <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                className="fill-current text-white h-5"
                                viewBox="0 0 20 20">
                                    <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/>
                            </svg>
                            </div>
                          </td>
                      </tr>

                      <tr className="text-center font-medium bg-gray-500 text-white  hover:bg-blue-700 py-1" >
                          <td className="px-2 w-48 text-left border-t-2 border-b-2">John Doe</td>
                          <td className="w-40 border-t-2 border-b-2">8-tg Grade</td>
                          <td className="p-2  w-40 border-t-2 border-b-2">Status</td>
                          <td className="bg-gray-100 border-t-0 border-b-0">                    
                            <div className="bg-blue-500 px-5 py-1 rounded-lg shadow-md cursor-pointer hover:bg-blue-700 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                className="fill-current text-white h-5">
                                <path d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                                </svg>
                            </div>
                            
                            </td>
                            <td className="bg-gray-100 border-t-0 border-b-0">
                            <div className="bg-orange-500 px-5 py-1 rounded-lg shadow-md cursor-pointer hover:bg-orange-700">
                              <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                className="fill-current text-white h-5"
                                viewBox="0 0 20 20">
                                    <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/>
                            </svg>
                            </div>
                          </td>
                      </tr>
     
      
                  </tbody>
              </table>
            </div>    
        );
    }

}

export default Students;