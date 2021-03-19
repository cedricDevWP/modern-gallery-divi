// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class Gallery extends Component {

  static slug = 'mogd_gallery';

  static css(props){
    
    let css = [];
    if(props.hover_overlay_icon){
      css.push([
        {
          selector:"%%order_class%% .mogd_gallery_images .mogd_gallery_image:hover .mogd_gallery_image_hover p:before",
          declaration:`
            content:"${window.ET_Builder.API.Utils.processFontIcon(props.hover_overlay_icon)}";
            font-family: ETModules;
          `
        },
      ]);
    }

    return css;
  }

  render() {

    console.log(this.props)

    return (
      <>
        <div className="mogd_gallery_images">
          {this.props.content}
        </div>
      </>
    );
  }
}

export default Gallery;
