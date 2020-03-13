import React from 'react';
import Card from './Card.js';

class Cards extends React.Component {

    render() {
        return (
            <div className="flex w-full flex-wrap justify-center my-10">
                <Card/>
                <Card/>
                <Card/>
                <Card/>
                <Card/>
          </div>  
        );
    }
}

export default Cards;