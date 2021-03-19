// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class Image extends Component {

  static slug = 'mogd_image';

  render() {

    let htmlImage;

    if(!this.props.image_upload){
      return "";
    }

    if(this.props.url){
      htmlImage = 
        <a href={this.props.url} target={this.props.url_new_window ? "_blank" : "_self"}>
          <img src={this.props.image_upload} alt={this.props.image_text}/>
        </a>
      ;
    }else{
      htmlImage = <img src={this.props.image_upload} alt={this.props.image_text}/>;
    }

    return (
      <>
        <div className="mogd_gallery_image">
          {htmlImage}
            <div className="mogd_gallery_image_hover">
                <p>Titre2</p>
            </div>
        </div>
      </>
    );
  }
}

export default Image;
