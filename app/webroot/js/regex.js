// **************************************************************************

// Copyright 2007 - 2008 Tavs Dokkedahl

// Contact: http://www.jslab.dk/contact.php

//

// This file is part of the JSLab DOM Correction (JDC) Program.

//

// JDC is free software; you can redistribute it and/or modify

// it under the terms of the GNU General Public License as published by

// the Free Software Foundation; either version 3 of the License, or

// any later version.

//

// JDC is distributed in the hope that it will be useful,

// but WITHOUT ANY WARRANTY; without even the implied warranty of

// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

// GNU General Public License for more details.

//

// You should have received a copy of the GNU General Public License

// along with this program. If not, see <http://www.gnu.org/licenses/>.

// ***************************************************************************



/*********************************************

*

*   JavaScript Regex Generator

*

**********************************************/



// Namespace

JSL = {};



/*********************************************

*

*   JSL.Rgx

*

**********************************************/





JSL.Rgx =

  function() {

    // Container

    var div = document.createElement('div');

    div.className = 'regex';

    // Textnode displaying regex

    div.regex = null;

    // Human readable text

    div.regexText = null;

    div.groups = [];

    div.tabs = [];

    // Methods

    div.update = JSL.Rgx.update;

    div.updateText = JSL.Rgx.updateText;

    div.addGroup = JSL.Rgx.addGroup;

    div.removeGroup = JSL.Rgx.removeGroup;

    // Setup first group

    div.addGroup();

    // Mark first tab as selected    

    div.tabs[0].className += ' selected';

    div.groups[0].style.display = 'block';

    // Add div for global modifers

    div.global = document.createElement('div');

    div.global.style.border = '1px solid #000';

    div.global.style.marginTop = '4px';

    div.global.style.padding = '4px';

    div.global.onclick =

      function(e) {

        if (e.target.nodeName.toLowerCase() == 'input')

          div.update();

      };

    var strong = document.createElement('strong');

    strong.style.display = 'block';

    strong.appendChild(document.createTextNode('Global modifiers'));

    div.global.appendChild(strong);

    // Case sensitive

    div.global.i = document.createElement('input');

    div.global.i.type = 'checkbox';

    div.global.i.id = 'case';

    div.global.appendChild(div.global.i);

    var label = document.createElement('label');

    label.htmlFor = div.global.i.id;

    label.appendChild(document.createTextNode('Case-insensitive'));

    div.global.appendChild(label);

    div.global.appendChild(document.createElement('br'));

    // Multiline

    div.global.m = document.createElement('input');

    div.global.m.type = 'checkbox';

    div.global.m.id = 'multi';

    div.global.appendChild(div.global.m);

    var label = document.createElement('label');

    label.htmlFor = div.global.m.id;

    label.appendChild(document.createTextNode('Match across newlines (multiline)'));

    div.global.appendChild(label);

    div.global.appendChild(document.createElement('br'));

    // Global

    div.global.g = document.createElement('input');

    div.global.g.type = 'checkbox';

    div.global.g.id = 'global';

    div.global.appendChild(div.global.g);

    var label = document.createElement('label');

    label.htmlFor = div.global.g.id;

    label.appendChild(document.createTextNode('Find all matches'));

    div.global.appendChild(label);

    div.appendChild(div.global);

    // Add div for displaying regex

    var con = document.createElement('div');

    con.className = 'infoNote';

    var strong = document.createElement('strong');

    strong.appendChild(document.createTextNode('Generated regular expression'));

    con.appendChild(strong);

    // div holding text

    div.regex = document.createElement('div');

    div.regex.style.fontFamily = 'Courier New';

    div.regex.style.fontSize = '12px';

    div.regex.style.backgroundColor = '#fff';

    div.regex.style.marginTop = '4px';

    div.regex.style.marginBottom = '4px';

    con.appendChild(div.regex);

    // Text node for human readable text

    var strong = document.createElement('strong');

    strong.appendChild(document.createTextNode('Textual meaning of regular expression'));

    con.appendChild(strong);

    div.regexText = document.createElement('div');

    con.appendChild(div.regexText);

    div.appendChild(con);

    div.update();

    return div;

  };



JSL.Rgx.colors = ['#00f','#0a0','#a00','#0aa','#a0a','#cc0','#aaa'];



// Update regex

JSL.Rgx.update =

  function() {

    // Assume regex is not ending on every update

    // This prop. is set by JSL.Rgx.Group.Update

    this.end = false;

    var s = '';

    // For each group

    var a = this.groups;

    var l = a.length;

    for(var i=0; i<l; i++)

      s += a[i].getValue(i);

    if (this.end)

      s += this.end;

    s = '/' + s + '/';

    if (this.global.i.checked)

      s += 'i';

    if (this.global.m.checked)

      s += 'm';

    if (this.global.g.checked)

      s += 'g';
    window.regularExpression = s.replace(/(<([^>]+)>)/ig,"");

    this.regex.innerHTML = s;

    this.updateText();

  };



JSL.Rgx.updateText =

  function() {

    var s = '';

    // For each group

    var a = this.groups;

    var l = a.length;

    for(var i=0; i<l; i++)

      s += a[i].getText(i);

    this.regexText.innerHTML = s;

  };



// Add group tab

JSL.Rgx.addGroup =

  function() {

    var n = this.groups.length;

    if (n > 6) {

      alert('Only ' + n + ' groups in beta version');

      return;

    }

    // If no groups/tabs yet add container

    if (!n) {

      // Container for tabs

      this.tabCon = document.createElement('div');

      // Event listener for selecting tab

      this.tabCon.onclick = JSL.Rgx.selectTab;

      this.tabCon.className = 'tabCon';

      // Add tab for adding groups

      var div = JSL.Rgx.GroupTab('Add group', true);

      div.addgroup = true;

      div.style.borderTopWidth = '3px';

      this.tabCon.appendChild(div);

      // Add clearing div for floats

      var clear = document.createElement('div');

      clear.className = 'clear';

      this.tabCon.appendChild(clear);

      this.appendChild(this.tabCon);

    }

    // Add tab before 'add group' tab

    // Only enable close if not first tab

    if (n)

      var tab = JSL.Rgx.GroupTab('Group ' + (n + 1));

    else

      var tab = JSL.Rgx.GroupTab('Group ' + (n + 1), true);

    this.tabs.push(tab);

    //tab.style.backgroundColor = JSL.Rgx.colors[n % 7];

    tab.style.borderTopColor = JSL.Rgx.colors[n % JSL.Rgx.colors.length];

    tab.style.borderTopWidth = '3px';

    this.tabCon.insertBefore(tab, this.tabCon.lastChild.previousSibling);

    // Create new group

    tab.group = JSL.Rgx.Group(n + 1);

    this.groups.push(tab.group);

    // If first group insert as last child

    if (!n)

      this.appendChild(tab.group);

    // else insert before text displaying regex

    else {

      this.insertBefore(tab.group, this.global);

      // We need to select the first radio button in IE now

      if (document.createEventObject) {

        document.getElementById('qty' + (n + 1) + '_0').checked = true;

      }

    }

    // Select group. This can not be done initially as there are no tab element

    // to dispatch the event to.

    if (n) {

      var e = document.createEvent('MouseEvent');

      e.initMouseEvent('click', true, true, window, 1, 0, 0, 0, 0, false, false, false, false, 0, null);

      tab.dispatchEvent(e);

    }

  };



// Remove group tab

JSL.Rgx.removeGroup =

  function(tab) {

    var i = 0;

    while(this.tabs[i] != tab)

      i++;

    // Remove group

    this.removeChild(this.groups[i]);

    // Remove tab

    this.tabCon.removeChild(tab);

    // Reorder groups and tabs

    for(var j=i; j<this.groups.length - 1; j++) { 

      this.groups[j] = this.groups[j + 1];

      this.tabs[j] = this.tabs[j + 1];

      // Re-number tabs

      this.tabs[j].firstChild.nodeValue = 'Group ' + (j + 1); 

      // Re-color tabs

      this.tabs[j].style.borderTopColor = JSL.Rgx.colors[j % JSL.Rgx.colors.length];

    }

    this.groups.pop();

    this.tabs.pop();

    // If removing selected tab

    if (/selected/.test(tab.className)) {

      // If removing last group select previous group

      if (i == this.tabs.length)

        tab = this.tabs[i - 1];

      // If not last group select next group

      else

        tab = this.tabs[i];

      // Select new tab

      var e = document.createEvent('MouseEvent');

      e.initMouseEvent('click', true, true, window, 1, 0, 0, 0, 0, false, false, false, false, 0, null);

      tab.dispatchEvent(e);

    }

    this.update();

  };

// Select a tag by index

JSL.Rgx.selectTabByIndex = 

  function(e,i) {

    var evt = document.createEvent('MouseEvent');

    evt.initMouseEvent('click', true, true, window, 1, 0, 0, 0, 0, false, false, false, false, 0, null);

    e.target.parentNode.parentNode.parentNode.tabs[i].dispatchEvent(evt);

  };



// Select a tab

JSL.Rgx.selectTab =

  function(e) {

    // If removing group

    if (e.target.nodeName.toLowerCase() == 'img') {

      e.currentTarget.parentNode.removeGroup(e.target.parentNode);

      return;

    }

    // If target is not on a tab just return

    if (e.target.className != 'tab')

      return;

    // If adding group

    if (e.target.addgroup) {

      e.currentTarget.parentNode.addGroup();

      return;

    }

    var a = this.childNodes;

    var l = a.length - 2;

    // For each tab

    for(var i=0; i<l; i++) {

      // Deselect selected tab

      if (a[i].group.style.display == 'block') {

        // Unselect tab

        a[i].className = a[i].className.replace(/\s*selected\s*/,'');

        // Hide group

        a[i].group.style.display = 'none';

        

        break;

      }

    }

    // Select new tab

    e.target.className += ' selected';

    // Show new group

    e.target.group.style.display = 'block';

  };



/*********************************************

*

*   JSL.Rgx.GroupTab

*

**********************************************/



JSL.Rgx.GroupTab =

  function(s,close) {

    var div = document.createElement('div');

    div.appendChild(document.createTextNode(s));

    if (!close) {

      var img = document.createElement('img');

      img.src = '../gfx/regex_close.gif';

      img.alt = img.title = 'Close group';

      div.appendChild(img);

    }

    div.className = 'tab';

    return div;

  };



/*********************************************

*

*   JSL.Rgx.Group

*

**********************************************/



// n is the group index

JSL.Rgx.Group =

  function(n) {

    // Container

    var div = document.createElement('div');

    // Select

    div.begin = JSL.Rgx.Group.Field.Begin(n);

    // Raw regex

    div.rgx = '';

    // Free input fields

    div.fields = [];

    // Quantifier human readable string

    div.qtyText = '';

    // Quantifier regex string

    div.qty = '';

    // Application of qty

    div.qtyGroup = false;

    // Group fields

    div.qtyGroupFields = false;

    // Capture group

    div.capture = false;

    div.className = 'group';

    // Methods

    div.addField = JSL.Rgx.Group.addField;

    div.removeField = JSL.Rgx.Group.removeField;

    div.getValue = JSL.Rgx.Group.getValue;

    div.getText = JSL.Rgx.Group.getText

    // Add begin field to group

    div.appendChild(div.begin);

    div.appendChild(document.createElement('hr'));

    // Add first field to group

    div.addField();

    // Add quantifier

    div.appendChild(document.createElement('hr'));

    // Reset ID counter

    JSL.Rgx.Group.Radio.id = 0;

    // Match exactly

    var radio = JSL.Rgx.Group.Radio(n);

    radio.style.verticalAlign = 'top';

    // 'exact' is default selected

    radio.checked = true;

    // Label for 'exact'

    var label = document.createElement('label');

    label.htmlFor = radio.id;

    if (!document.createEventObject)

      label.onclick = JSL.Rgx.Group.RadioForceSelect;

    label.appendChild(document.createTextNode('Exactly '));

    radio.num = JSL.Rgx.Group.Numeric(1, JSL.Rgx.Group.Numeric.exact);

    label.appendChild(radio.num);

    label.appendChild(document.createTextNode(' time(s)'));

    div.appendChild(radio);

    div.appendChild(label);

    div.appendChild(document.createElement('br'));

    // Match more than

    var radio = JSL.Rgx.Group.Radio(n);

    radio.style.verticalAlign = 'top';

    // Label for 'exact'

    var label = document.createElement('label');

    label.htmlFor = radio.id;

    if (!document.createEventObject)

      label.onclick = JSL.Rgx.Group.RadioForceSelect;

    radio.num = JSL.Rgx.Group.Numeric(1, JSL.Rgx.Group.Numeric.moreThan);

    label.appendChild(radio.num);

    label.appendChild(document.createTextNode(' or more times'));

    div.appendChild(radio);

    div.appendChild(label);

    div.appendChild(document.createElement('br'));

    // Match in between

    var radio = JSL.Rgx.Group.Radio(n);

    radio.style.verticalAlign = 'top';

    // Label for 'between'

    var label = document.createElement('label');

    label.htmlFor = radio.id;

    if (!document.createEventObject)

      label.onclick = JSL.Rgx.Group.RadioForceSelect;

    label.appendChild(document.createTextNode('Between '));

    radio.num = JSL.Rgx.Group.Numeric(0, JSL.Rgx.Group.Numeric.between);

    label.appendChild(radio.num);

    label.appendChild(document.createTextNode(' and '));

    radio.num2 = JSL.Rgx.Group.Numeric(1, JSL.Rgx.Group.Numeric.between);

    label.appendChild(radio.num2);

    label.appendChild(document.createTextNode(' times'));

    div.appendChild(radio);

    div.appendChild(label);

    div.appendChild(document.createElement('br'));

    // Match any number of times greedy

    var radio = JSL.Rgx.Group.Radio(n);

    radio.style.verticalAlign = 'top';

    // Label for 'any number of times'

    var label = document.createElement('label');

    label.htmlFor = radio.id;

    label.appendChild(document.createTextNode('Any number of times (greedy)'));

    radio.greedy = true;

    div.appendChild(radio);

    div.appendChild(label);

    div.appendChild(document.createElement('br'));

    // Match any number of times non-greedy

    var radio = JSL.Rgx.Group.Radio(n);

    radio.style.verticalAlign = 'top';

    // Label for 'any number of times'

    var label = document.createElement('label');

    label.htmlFor = radio.id;

    label.appendChild(document.createTextNode('Any number of times until next group (non-greedy)'));

    div.appendChild(radio);

    div.appendChild(label);

    // Application of quantifier

    div.appendChild(document.createElement('hr'));

    var cb = document.createElement('input');

    cb.type = 'checkbox';

    cb.id = 'qty' + n + '_' + JSL.Rgx.Group.Radio.id++;

    cb.style.marginLeft = 0;

    cb.onclick = function(e) {div.qtyGroup = this.checked; div.parentNode.update();};

    var label = document.createElement('label');

    label.htmlFor = cb.id;

    label.appendChild(document.createTextNode('Apply quantifier to entire group'));

    div.appendChild(cb);

    div.appendChild(label);

    div.appendChild(document.createElement('br'));

    // Group fields

    var cb = document.createElement('input');

    cb.type = 'checkbox';

    cb.id = 'qty' + n + '_' + JSL.Rgx.Group.Radio.id++;

    cb.style.marginLeft = 0;

    cb.onclick = function(e) {div.qtyGroupFields = this.checked; div.parentNode.update();};

    var label = document.createElement('label');

    label.htmlFor = cb.id;

    label.appendChild(document.createTextNode('Group fields'));

    div.appendChild(cb);

    div.appendChild(label);

    div.appendChild(document.createElement('br'));

    // Capture group

    var cb = document.createElement('input');

    cb.type = 'checkbox';

    cb.id = 'qty' + n + '_' + JSL.Rgx.Group.Radio.id++;

    cb.style.marginLeft = 0;

    cb.onclick = function(e) {div.capture = this.checked; div.parentNode.update();};

    var label = document.createElement('label');

    label.htmlFor = cb.id;

    label.appendChild(document.createTextNode('Capture group'));

    div.appendChild(cb);

    div.appendChild(label);



    return div;

  };



// Utility function for creating radio buttons

JSL.Rgx.Group.Radio =

  function(n) {

    var input;

    // If IE

    if (document.createEventObject)

      input = document.createElement('<input name="qty' + n + '" >');

    else {

      input = document.createElement('input');

      input.name = 'qty' + n;

    }

    input.type = 'radio';

    input.id = 'qty' + n + '_' + JSL.Rgx.Group.Radio.id++;

    input.onclick = JSL.Rgx.Group.Radio.onclick;

    input.style.marginLeft = 0;

    input.style.marginRight = '4px';

    return input;

  };



// Update regex on click

JSL.Rgx.Group.Radio.onclick =

  function(e) {

    // Update is implicitely called by onkeyup handler for numeric inputs

    // If 'any number of times' is selected then this.num does not exist

    if (this.num)

      this.num.onkeyup.call(this.num);

    else {

      if (this.greedy) {

        this.parentNode.qty = '*';

        this.parentNode.qtyText = 'any number of times';

      }

      else {

        this.parentNode.qty = '*?';

        this.parentNode.qtyText = 'any number of times until next group';

      }

      this.parentNode.parentNode.update();

    }

  };



// Make sure radio button is selected when text input

// inside label is selected

JSL.Rgx.Group.RadioForceSelect =

  function(e) {

    if (e.target.nodeName.toLowerCase() == 'input') {

      e.preventDefault();

      document.getElementById(this.htmlFor).checked = true;

      e.target.focus();

    }

  };



// Utility function for placing inputs in label

JSL.Rgx.Group.Numeric =

  function(n, f) {

    var input = document.createElement('input');

    input.value = n;

    input.style.textAlign = 'right';

    input.style.width = '24px';

    input.onkeyup = f;

    // Onfocus select radio button

    if (!document.createEventObject) {

      input.onfocus =

        function(e) {

          e.target.parentNode.previousSibling.checked = true;

          e.target.onkeyup.call(e.target);

        };

    }

    else {

      input.onfocus =

        function(e) {

          e.target.parentNode.previousSibling.checked = true;

          //JSL.Rgx.Group.Numeric.exact.call(e.target);

          e.target.onkeyup.call(e.target);

        };

    }

    return input;

  };



// Update exact

JSL.Rgx.Group.Numeric.exact =

  function(e) {

    // Strip non digits

    this.value = this.value.replace(/\D*/g,'');

    // Convert to number

    var n = this.value * 1;

    var qty;

    var qtyText;

    if (n < 2) {

      qty = '';

      qtyText = '';

    }

    else {

      qty = '{' + n + '}';

      qtyText = 'exactly ' + n + ' times';

    }

    this.parentNode.parentNode.qty = qty;

    this.parentNode.parentNode.qtyText = qtyText;

    this.parentNode.parentNode.parentNode.update();

  };



// Update more than

JSL.Rgx.Group.Numeric.moreThan =

  function(e) {

    // Strip non digits

    this.value = this.value.replace(/\D*/g,'');

    // Convert to number

    var n = this.value * 1;

    var qty;

    var qtyText;

    if (n < 1) {

      qty = '*';

      qtyText = 'any number of times';

    }

    else if (n == 1) {

      qty = '+';

      qtyText = '1 or more times';

    }

    else {

      qty = '{' + n + ',}';

      qtyText = 'more than ' + n + ' times';

    }

    this.parentNode.parentNode.qty = qty;

    this.parentNode.parentNode.qtyText = qtyText;

    this.parentNode.parentNode.parentNode.update();

  };



// Update in between

JSL.Rgx.Group.Numeric.between =

  function(e) {

    // Get both inputs

    var other = this.parentNode.previousSibling.num == this ? this.parentNode.previousSibling.num2 : this.parentNode.previousSibling.num;

    // Strip non digits

    this.value = this.value.replace(/\D*/g,'');

    other.value = other.value.replace(/\D*/g,'');

    // Convert to number

    var n = this.value * 1;

    var m = other.value * 1;

    // Let m be the smaller value

    if (m > n) {

      var tmp = m;

      m = n;

      n = tmp;

    }

    var qty;

    var qtyText;

    if (m < 1 && n < 1) {

      qty = '';

      qtyText = '';

    }

    else if (m < 1 && n == 1) {

      qty = '?';

      qtyText = '0 or 1 times';

    }

    else if (m == 1 && n == 1) {

      qty = '';

      qtyText = '';

    }

    else if (m == n) {

      qty = '{' + m + '}';

      qtyText = 'exactly ' + m + ' times';

    }

    else {

      qty = '{' + m + ',' + n + '}';

      qtyText = 'between ' + m + ' and ' + n + ' times';

    }

    this.parentNode.parentNode.qty = qty;

    this.parentNode.parentNode.qtyText = qtyText;

    this.parentNode.parentNode.parentNode.update();

  };



// Add field to group

JSL.Rgx.Group.addField = 

  function(s) {

    var f = JSL.Rgx.Group.Field(this.fields.length);

    if (!this.fields.length)

      this.appendChild(f);

    else

      this.insertAfter(f, this.fields[this.fields.length - 1]);

    this.fields.push(f);  

  };



// Remove field from group

JSL.Rgx.Group.removeField = 

  function(f) {

    var a = this.fields;

    var l = a.length;

    for(var i=0; i<l; i++) {

      if (a[i] == f)

        break;

    }

    for(var j=i; j<l-1; j++) {

      a[j] = a[j + 1];

      a[j].firstChild.nodeValue = 'Field ' + (j + 1);

    }

    this.removeChild(f);

    a.pop();

    this.parentNode.update();

  };



// Get value of group

// i is the group index used to get the color

JSL.Rgx.Group.getValue =

  function(n) {

    // Color to match tab color

    var color = JSL.Rgx.colors[n % JSL.Rgx.colors.length];

    this.rgx = '';

    var s = '';

    // If the regex is ending remember for later

    if (/\$/.test(this.begin.value))

      this.parentNode.end = '<span onclick="JSL.Rgx.selectTabByIndex(event, ' + n + ');" title="Group ' + (n + 1) + '" + style="cursor: pointer; color:' + color + '">$</span>';

    // Get field values

    var a = this.fields;

    var l = a.length;

    var tmp;

    for(var i=0; i<l; i++) {

      tmp = a[i].getValue();

      if (!tmp)

        continue;

      if (i && this.rgx)

        this.rgx += '|';

      this.rgx += tmp;

    }

    // Get quantifier if field has any input besides start and end

    if (this.rgx) {

      // If qty applies to entire group

      if (this.qtyGroup && this.qty && this.rgx.length > 1)

        this.rgx = '(?:' + this.rgx + ')' + this.qty;

      else

        this.rgx += this.qty;

    }

    // If this group is a forward assertion

    if (this.rgx.length && /\?/.test(this.begin.value))

      this.rgx = '(?=' + this.rgx + ')';

    // Else if this group is a negated forward assertion

    else if (this.rgx.length && /\!/.test(this.begin.value))

      this.rgx = '(?!' + this.rgx + ')';

    // If capture or group

    if (this.rgx.length) {

      if (this.capture)

        this.rgx = '(' + this.rgx + ')';

      else if (this.qtyGroupFields && this.rgx.length > 1)

        this.rgx = '(?:' + this.rgx + ')';

    }

    // Get value from beginning select box

    if (/\^/.test(this.begin.value))

      this.rgx = '^' + this.rgx;

    // Else if this is a logical OR group

    else if (this.rgx.length && /\|/.test(this.begin.value))

      this.rgx = '|' + this.rgx;

    s = '<span onclick="JSL.Rgx.selectTabByIndex(event, ' + n + ');" title="Group ' + (n + 1) + '" + style="cursor: pointer; color:' + color + '">' + this.rgx + '</span>';

    return s;

  };



// Get regex as human readable text

JSL.Rgx.Group.getText =

  function(n) {

    // Color to match tab color

    var color = JSL.Rgx.colors[n % JSL.Rgx.colors.length];

    // Get text of select

    var s = '<span onclick="JSL.Rgx.selectTabByIndex(event, ' + n + ');" title="Group ' + (n + 1) + '" + style="cursor: pointer; color:' + color + '">' + this.begin.options[this.begin.selectedIndex].text;

    // Get qauntifier text - the not so clever way

    var m = null;

    // Get field text

    var a = this.fields;

    var l = a.length;

    var tmp;

    var rgx = '';

    for(var i=0; i<l; i++) {

      tmp = a[i].getText();

      if (tmp.length) {

        // If not first field and some regex is entered add 'or'

        if (i && rgx)

          s += ' or';

        // If only spaces

        if (/^\s+$/.test(tmp))

          s += ' <strong>' + tmp.length + ' space' + (tmp.length > 1 ? 's' : '') + '</strong>';

        // if character class

        else if (!a[i].freeInput)

          s += ' <strong>' + tmp + '</strong>';

        // if single character

        else if (tmp.length == 1) {

          s += ' the character <strong>' + tmp + '</strong>';

        }

        // if free string

        else {

          // if this is the last field, string length is more than 1

          // and quantifier applies to last char

          if (i == l - 1 && tmp.length > 1 && !this.qtyGroup && this.qtyText) {

            var p = tmp[tmp.length - 1];

            var r = tmp.substring(0, tmp.length - 1);

            if (r.length > 1)

              s += ' the string <strong>' + r + '</strong>';

            else

              s += ' the character <strong>' + r + '</strong>';

            s += ' followed by the character <strong>' + p + '</strong>';

          }

          else

            s += ' the string <strong>' + tmp + '</strong>';

        }

        rgx += tmp;

      }

    }

    if (rgx)

      s += ' ' + this.qtyText;

    s += '</span><br />';

    // Get quantifier text

    return s;

  };



/*********************************************

*

*   JSL.Rgx.Group.Field

*

**********************************************/



JSL.Rgx.Group.Field =

  function(n) {

    // Container

    var div = document.createElement('div');

    div.appendChild(document.createTextNode('Field ' + (n + 1)));

    div.appendChild(document.createElement('br'));

    div.freeInput = true;

    // Methods

    div.getValue = JSL.Rgx.Group.Field.getValue;

    div.getText = JSL.Rgx.Group.Field.getText;

    // Input

    div.input = document.createElement('input');

    div.input.style.width = '240px';

    div.input.style.marginRight = '2px';

    div.appendChild(div.input);

    // Update on keydown

    div.onkeyup = JSL.Rgx.Group.Field.onkeyup;

    var select = document.createElement('select');

    select.style.verticalAlign = 'middle';

    select.style.marginRight = '2px';

    select.onchange = JSL.Rgx.Group.Field.changeClass;

    select.add(new Option('Free text',''), null);

    select.add(new Option('any character','.'), null);

    select.add(new Option('any letter a-z','[a-zA-Z]'), null);

    select.add(new Option('any lowercase letter a-z','[a-z]'), null);

    select.add(new Option('any uppercase letter A-Z','[A-Z]'), null);

    select.add(new Option('any digit 0-9','\\d'), null);

    select.add(new Option('any ASCII word character','\\w'), null);

    select.add(new Option('any whitespace','\\s'), null);

    select.add(new Option('any word boundary','\\b'), null);

    //select.add(new Option('custom class','[]'), null);

    div.appendChild(select);

    

    // Button for adding/removing field

    var input = document.createElement('input');

    input.type = 'button';

    if (!n) {

      input.value = 'Add field';

      input.onclick = function(e) {div.parentNode.addField();};

    }

    else {

      input.value = 'Remove field';

      input.onclick = function(e) {div.parentNode.removeField(div);};

    }

    div.appendChild(input);

    return div;

  };



// Beginning of group

JSL.Rgx.Group.Field.Begin =

  function(n) {

    var select = document.createElement('select');

    if (n < 2) {

      select.add(new Option('Match a string which contains',''), null);

      select.add(new Option('Match a string which starts with','^'), null);

      select.add(new Option('Match a string which ends in','$'), null);

      select.add(new Option('Match a string which starts and ends in','^$'), null);

    }

    else {

      select.add(new Option('followed by',''), null);

      select.add(new Option('or','|'), null);

      select.add(new Option('only if followed by','?'), null);

      select.add(new Option('only if not followed by','!'), null);

      select.add(new Option('ending in','$'), null);

    }

    select.onchange = JSL.Rgx.Group.Field.Begin.onchange;

    return select;

  };



// Call update of regex

JSL.Rgx.Group.Field.Begin.onchange =

  function(e) {

    this.parentNode.parentNode.update();

  };



JSL.Rgx.Group.Field.onkeyup =

  function(e) {

    e.target.parentNode.parentNode.parentNode.update();

  };



// Get value of single field

JSL.Rgx.Group.Field.getValue =

  function() {

    // Replace regex identifiers if free input

    if (this.freeInput)

      return this.input.value.replace(/[\^\$\.\*\+\?\=\!\:\|\(\)\[\]\{\}\\\/]/g,function($0){return '\\' + $0;});

    else

      return this.input.nextSibling.value;

  };



// Get text from field

JSL.Rgx.Group.Field.getText =

  function() {

    // If free input

    return this.input.value;

  };



JSL.Rgx.Group.Field.changeClass =

  function(e) {

    if (this.value) {

      this.previousSibling.value = this.options[this.selectedIndex].text;

      this.previousSibling.disabled = true;

      this.parentNode.freeInput = false;

    }

    else {

      this.previousSibling.value = '';

      this.previousSibling.disabled = false;

      this.parentNode.freeInput = true;

    }

    e.target.parentNode.parentNode.parentNode.update();

  };



function main(e) {

  // Define utility methods

  if (document.createEventObject && !window.EPE) {

    alert('This script uses JDC to run in Internet Explorer. Currently only IE 6 and 7 are supported by JDC. When IE 8 gets out of beta we\'ll have a look at that too.');

    return;

  }

  HTMLElement.prototype.insertAfter =

    function(nC, rC) {

      rC.nextSibling ? rC.parentNode.insertBefore(nC, rC.nextSibling) : rC.appendChild(nC);

    };

  var rgx = JSL.Rgx();

  document.getElementById('content').appendChild(rgx);

  // Now make first radio in first group selected in IE

  if (document.createEventObject)

    document.getElementById('qty1_0').checked = true;

}



window.onload = main;