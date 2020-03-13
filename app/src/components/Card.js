import React from 'react';


class Card extends React.Component {

    render() {
        return(
            <div className="card w-64 rounded-lg overflow-hidden m-2 shadow-lg">
                <img className="h-40 w-full object-cover" src="https://picsum.photos/500"></img>
                <div className="h-40">
                    <h3 className="text-center text-base text-blue-700 font-medium uppercase p-1 bg-gray-300">Some title</h3>
                    <p className="px-2 py-3 text-sm">Some text</p>
                </div>
                <div className="flex mb-2">
                    <span className="tag">Tag</span>
                    <span className="tag">Tag</span>
                    <span className="tag">Tag</span> 
                </div>
            </div>   
        );
    }

}

export default Card;