Detector = {

  canvas : !! window.CanvasRenderingContext2D,
  webgl : ( function () { try { return !! window.WebGLRenderingContext && !! document.createElement( 'canvas' ).getContext( 'experimental-webgl' ); } catch( e ) { return false; } } )(),
  gdGL: window.WebGLRenderingContext,
  workers : !! window.Worker,
  fileapi : window.File && window.FileReader && window.FileList && window.Blob

};
