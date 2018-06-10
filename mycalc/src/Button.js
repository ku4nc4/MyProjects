import React from 'react';

class Button extends React.Component{
    handleClick = () => {
        this.props.clickHandler(this.props.val);
    };

    render(){
        return(
            <button onClick={this.handleClick}>
                {this.props.val}
            </button>
        )
    }
}
export default Button;