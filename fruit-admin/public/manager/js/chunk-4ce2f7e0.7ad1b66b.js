(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4ce2f7e0"],{3530:function(e,t,n){"use strict";n.r(t);var s=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("el-container",[n("el-aside",[n("el-menu",{attrs:{router:!0,"default-openeds":["system","store","user","sells"],"default-active":e.active}},e._l(e.routes,(function(t){return n("el-submenu",{key:t.name,attrs:{index:t.name},scopedSlots:e._u([{key:"title",fn:function(){return[e._v(" "+e._s(t.meta.title)+" ")]},proxy:!0}],null,!0)},e._l(t.children,(function(t){return n("el-menu-item",{key:t.name,attrs:{index:t.name,route:{name:t.name}}},[e._v(" "+e._s(t.meta.title)+" ")])})),1)})),1)],1),n("el-container",[n("el-header",[n("el-row",[n("el-col",{attrs:{span:6}},[n("h3",{staticClass:"title"},[e._v("鲜果汇后台管理系统")])]),n("el-col",{attrs:{span:7}},[n("i",{staticClass:"el-icon-date"}),e._v("当前时间："+e._s(e.now)+" ")]),n("el-col",{attrs:{span:7}},[e._v(" 当前账号："+e._s(e.user)+" ")]),n("el-col",{attrs:{span:4}},[n("el-button",{attrs:{type:"text"},on:{click:e.logout}},[e._v("退出登录")])],1)],1)],1),n("el-main",[n("router-view")],1)],1)],1)],1)},o=[],r=(n("0d03"),n("b0c0"),n("2095")),a={data:function(){return{now:"",user:sessionStorage.getItem("user"),routes:[],active:"password"}},methods:{logout:function(){sessionStorage.removeItem("user"),sessionStorage.removeItem("role"),this.$router.push({name:"login"}),location.reload()}},created:function(){var e=this;setInterval((function(){var t=Date.now();e.now=Object(r["a"])(t/1e3)}),1e3)},mounted:function(){"1"===sessionStorage.getItem("role")?this.routes=this.$store.state.obj1.children:this.routes=this.$store.state.obj2.children,this.active=this.$route.name}},i=a,l=(n("36c8"),n("2877")),u=Object(l["a"])(i,s,o,!1,null,"6e599e7e",null);t["default"]=u.exports},"36c8":function(e,t,n){"use strict";var s=n("8459"),o=n.n(s);o.a},8459:function(e,t,n){}}]);
//# sourceMappingURL=chunk-4ce2f7e0.7ad1b66b.js.map