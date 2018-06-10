import React from 'react';
import Button from './Button';

class Buttpanel extends React.Component{
    handleClick = buttonName => {
        this.props.clickHandler(buttonName);
    };

    render(){
        return(
            <div>
                <table>
                    <tr>
                        <td><Button val={1} clickHandler={this.handleClick}/></td>
                        <td><Button val={2} clickHandler={this.handleClick}/></td>
                        <td><Button val={3} clickHandler={this.handleClick}/></td>
                    </tr>
                    <tr>
                        <td><Button val={4} clickHandler={this.handleClick}/></td>
                        <td><Button val={5} clickHandler={this.handleClick}/></td>
                        <td><Button val={6} clickHandler={this.handleClick}/></td>
                    </tr>
                    <tr>
                        <td><Button val={7} clickHandler={this.handleClick}/></td>
                        <td><Button val={8} clickHandler={this.handleClick}/></td>
                        <td><Button val={9} clickHandler={this.handleClick}/></td>
                    </tr>
                    <tr>
                        <td><Button val={'+'} clickHandler={this.handleClick}/></td>
                        <td><Button val={'-'} clickHandler={this.handleClick}/></td>
                        <td><Button val={'*'} clickHandler={this.handleClick}/></td>
                    </tr>
                </table>
            </div>
        )
    }
}
export default Buttpanel