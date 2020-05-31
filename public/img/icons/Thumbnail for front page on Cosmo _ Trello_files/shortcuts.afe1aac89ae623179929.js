(window.webpackJsonp=window.webpackJsonp||[]).push([[96],{"./app/src/components/Shortcuts/Shortcuts.less":function(e,t,a){var l=a("./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/less-loader/dist/cjs.js?!./app/src/components/Shortcuts/Shortcuts.less");"string"==typeof l&&(l=[[e.i,l,""]]);var s={hmr:!0,transform:void 0,insertInto:void 0};a("./node_modules/style-loader/lib/addStyles.js")(l,s);l.locals&&(e.exports=l.locals)},"./app/src/components/Shortcuts/index.ts":function(e,t,a){"use strict";a.r(t),a.d(t,"default",(function(){return u}));var l=a("./node_modules/react/index.js"),s=a.n(l),n=a("./app/common/components/controls/icon/index.tsx"),r=a("./app/src/components/Shortcuts/Shortcuts.less"),o=a.n(r),c=a("./app/common/lib/util/i18n/index.ts"),i=Object(c.forTemplate)("shortcuts"),d=function(e){return s.a.createElement("div",{className:o.a.item},s.a.createElement("h3",{className:o.a.itemHeader},i(e.messageId)),s.a.createElement("div",{className:o.a.itemKeys},e.keys.map((function(e,t){return s.a.createElement("span",{className:o.a.keyboardKey,key:t},e)}))),s.a.createElement("div",{className:o.a.itemDesc},e.children))},m=function(e){return s.a.createElement("table",null,s.a.createElement("thead",null,s.a.createElement("tr",null,s.a.createElement("th",null,i("key")),s.a.createElement("th",null,i("label-color")))),s.a.createElement("tbody",null,e.keys.map((function(e,t){return s.a.createElement("tr",{key:t},s.a.createElement("td",null,e[0]),s.a.createElement("td",null,i(e[1])))}))))},p=[["1","green"],["2","yellow"],["3","orange"],["4","red"],["5","purple"],["6","blue"],["7","sky"],["8","lime"],["9","pink"],["0","black"]],u=function(){return s.a.createElement("div",{className:o.a.shortcutsContainer},s.a.createElement("div",{className:o.a.header},s.a.createElement(n.default,{large:!0,className:o.a.headerIcon,color:n.IconColor.Gray,name:n.IconName.Information}),s.a.createElement("h2",null,i("keyboard-shortcuts"))),s.a.createElement("div",{className:o.a.list},s.a.createElement("hr",null),s.a.createElement(d,{keys:["←","↓ / J","↑ / K","→"],messageId:"navigate-cards"},s.a.createElement("p",null,i("pressing-the-arrow-keys-will-select-adjacent-cards-on-a-board-pressing-j-will-select-the-card-below-the-current-card-pressing-k-will-select-the-card-above-the-current-card"))),s.a.createElement(d,{keys:["B"],messageId:"open-header-boards-menu"},s.a.createElement("p",null,i("pressing-b-opens-the-boards-menu-in-the-header-you-can-search-for-boards-and-navigate-boards-with-the-up-and-down-arrows-pressing-enter-with-a-board-selected-will-open-it"))),s.a.createElement(d,{keys:["/"],messageId:"focus-search-box"},s.a.createElement("p",null,i("pressing-puts-the-cursor-in-the-search-box-in-the-header"))),s.a.createElement(d,{keys:["C"],messageId:"archive-card"},s.a.createElement("p",null,i("pressing-c-will-archive-a-card"))),s.a.createElement(d,{keys:["D"],messageId:"due-date"},s.a.createElement("p",null,i("pressing-d-will-open-the-due-date-picker-for-a-card"))),s.a.createElement(d,{keys:["-"],messageId:"add-checklist"},s.a.createElement("p",null,i("pressing-dash-adds-a-checklist"))),s.a.createElement(d,{keys:["E"],messageId:"quick-edit-mode"},s.a.createElement("p",null,i("if-hovering-over-a-card-pressing-e-will-open-quick-edit-mode-which-lets-you-quickly-edit-the-title-and-other-card-attributes"))),s.a.createElement(d,{keys:["Esc"],messageId:"close-menu-cancel-editing"},s.a.createElement("p",null,i("pressing-esc-will-close-an-open-dialog-window-or-pop-over-or-cancel-edits-and-comments-you-are-composing"))),s.a.createElement(d,{keys:["Command/Control","Enter"],messageId:"save-text"},s.a.createElement("p",null,i("meta-enter-copy"))),s.a.createElement(d,{keys:["Enter"],messageId:"open-card"},s.a.createElement("p",null,i("pressing-enter-will-open-the-currently-selected-card-pressing-shift-enter-while-submitting-a-card-will-open-it-immediately-after-creating-it"))),s.a.createElement(d,{keys:["F"],messageId:"open-card-filter-menu"},s.a.createElement("p",null,i("use-f-to-open-the-card-filter-menu-the-search-by-title-input-is-automatically-focused"))),s.a.createElement(d,{keys:["L"],messageId:"label"},s.a.createElement("p",null,i("pressing-l-opens-a-pop-over-of-the-available-labels-clicking-a-label-will-add-or-remove-it-from-the-card")),s.a.createElement("p",null,i("pressing-one-of-the-following-number-keys-will-apply-or-remove-that-label")),s.a.createElement(m,{keys:p})),s.a.createElement(d,{keys:[";"],messageId:"label-text"},s.a.createElement("p",null,i("shows-or-hides-label-text"))),s.a.createElement(d,{keys:["M"],messageId:"add-remove-members"},s.a.createElement("p",null,i("pressing-m-opens-the-add-remove-members-menu-clicking-a-member-s-avatar-will-assign-or-unassign-that-person"))),s.a.createElement(d,{keys:["N"],messageId:"insert-new-card"},s.a.createElement("p",null,i("pressing-n-opens-a-pop-over-that-allows-you-to-add-a-card-after-the-currently-selected-card"))),s.a.createElement(d,{keys:[",",".","<",">"],messageId:"move-card-to-adjacent-list"},s.a.createElement("p",null,i("pressing-period-or-comma-will-move-a-card-to-the-adjacent-left-or-right-list").replace("&lt;","<").replace("&gt;",">"))),s.a.createElement(d,{keys:["Q"],messageId:"my-cards-filter"},s.a.createElement("p",null,i("pressing-the-q-key-toggles-the-cards-assigned-to-me-filter"))),s.a.createElement(d,{keys:["S"],messageId:"watch"},s.a.createElement("p",null,i("pressing-s-will-allow-you-to-watch-or-unwatch-a-card-watching-a-card-will-notify-you-of-actions-related-to-the-card"))),s.a.createElement(d,{keys:["Space"],messageId:"assign-self"},s.a.createElement("p",null,i("pressing-space-will-assign-or-unassign-yourself-to-a-card"))),s.a.createElement(d,{keys:["T"],messageId:"edit-title"},s.a.createElement("p",null,i("if-viewing-a-card-pressing-t-will-edit-the-title-if-hovering-over-a-card-pressing-t-will-open-the-card-and-edit-the-title"))),s.a.createElement(d,{keys:["V"],messageId:"vote"},s.a.createElement("p",null,i("pressing-v-will-add-or-remove-your-vote-on-a-card-if-the-voting-power-up-is-enabled"))),s.a.createElement(d,{keys:["W"],messageId:"toggle-board-menu"},s.a.createElement("p",null,i("pressing-w-will-collapse-or-expand-the-board-menu-the-sidebar-on-the-right"))),s.a.createElement(d,{keys:["X"],messageId:"clear-all-filters"},s.a.createElement("p",null,i("use-x-to-clear-all-active-card-filters"))),s.a.createElement(d,{keys:["?"],messageId:"open-shortcuts-page"},s.a.createElement("p",null,i("pressing-will-open-the-shortcuts-page"))),s.a.createElement(d,{keys:["@"],messageId:"autocomplete-members"},s.a.createElement("p",null,i("when-writing-a-comment-you-can-type-at-plus-a-member-s-name-username-or-initials-and-get-a-list-of-matching-members-you-can-navigate-that-list-with-the-up-and-down-arrows-pressing-enter-or-tab-with-a-member-selected-will-mention-that-user-in-the-comment-the-mentioned-user-will-get-a-notification-once-submitted")),s.a.createElement("p",null,i("when-adding-a-new-card-you-can-use-the-same-method-to-assign-members-to-cards-before-submitting-them"))),s.a.createElement(d,{keys:["#"],messageId:"autocomplete-labels"},s.a.createElement("p",null,i("when-adding-a-new-card-you-can-type-plus-the-label-s-color-or-title-and-get-a-list-of-matching-labels-you-can-use-the-up-and-down-arrows-to-navigate-the-resulting-list-pressing-enter-or-tab-will-add-the-label-to-the-composed-card-the-labels-will-be-added-to-the-card-when-you-submit"))),s.a.createElement(d,{keys:["^"],messageId:"autocomplete-position"},s.a.createElement("p",null,i("when-adding-a-new-card-you-can-type-plus-a-list-name-or-position-in-a-list-you-can-also-type-top-or-bottom-to-add-to-the-top-or-bottom-of-the-current-list-you-can-use-the-up-and-down-arrows-to-navigate-the-resulting-list-pressing-enter-or-tab-will-automatically-change-the-position-of-the-composed-card"))),s.a.createElement(d,{keys:["Command/Control","C / V"],messageId:"copy-card"},s.a.createElement("p",null,i("when-hovering-over-a-card-pressing-control-c-or-command-c-will-copy-the-card-to-your-clipboard-pasting-while-hovering-over-a-list-will-copy-the-card-to-the-list"))),s.a.createElement(d,{keys:["Command/Control","X / V"],messageId:"move-card"},s.a.createElement("p",null,i("when-hovering-over-a-card-pressing-control-x-ord-command-x-will-copy-the-card-to-your-clipboard-pasting-while-hovering-over-a-list-will-move-the-card-to-the-list")))))}},"./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/less-loader/dist/cjs.js?!./app/src/components/Shortcuts/Shortcuts.less":function(e,t,a){(t=e.exports=a("./node_modules/css-loader/lib/css-base.js")(!1)).push([e.i,"._3nmih4eJS8HRUZ{margin:0;overflow-x:hidden;overflow-y:auto;padding:0 8px 8px 16px;min-width:552px}.kfcIv_yUsBpAtO{margin:12px 40px 0 56px;position:relative}.kfcIv_yUsBpAtO h2{margin:4px 0 0;padding-top:8px}.pctd3wmtt__7wi{left:-40px;position:absolute;top:4px}.wBc6YvS0rlO_l-{padding:0 52px}@media only screen and (max-width:750px){.wBc6YvS0rlO_l-{padding:0}}.X9msV8f06sm9Dd{border-bottom:1px solid rgba(9,30,66,.13);margin-bottom:8px;padding:8px 0;position:relative}._1q7P7jSFAm88bg{float:left;margin:6px 16px 6px 0}.H5QOfHQq9N3G5q{float:right;top:4px;right:0}._2VVHPDfc7S7pBT{clear:both}.F9tOjh6R0cqToC{background:#fff;border-radius:3px;box-shadow:0 1px 1px rgba(9,30,66,.25),0 0 0 1px rgba(9,30,66,.08);color:#172b4d;font-weight:700;cursor:default;display:inline-block;margin:0 5px 10px 8px;padding:6px 10px;font-size:16px}",""]),t.locals={shortcutsContainer:"_3nmih4eJS8HRUZ",header:"kfcIv_yUsBpAtO",headerIcon:"pctd3wmtt__7wi",list:"wBc6YvS0rlO_l-",item:"X9msV8f06sm9Dd",itemHeader:"_1q7P7jSFAm88bg",itemKeys:"H5QOfHQq9N3G5q",itemDesc:"_2VVHPDfc7S7pBT",keyboardKey:"F9tOjh6R0cqToC"}}}]);
//# sourceMappingURL=shortcuts.afe1aac89ae623179929.js.map