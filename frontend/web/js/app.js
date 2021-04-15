'use strict';

import Katalog from './components/katalog.js';

(function(){
  
  if ($('[data-page-type="katalog"]').length > 0) {
    const katalog = new Katalog();
  }
})();
