(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-09b2ceb4"],{"0418":function(t,e,a){"use strict";var l=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("el-breadcrumb",{staticStyle:{"margin-bottom":"30px"},attrs:{separator:"/"}},t._l(t.items,(function(e){return a("el-breadcrumb-item",{key:e},[t._v(t._s(e))])})),1)},r=[],n={data:function(){return{}},props:{items:{type:Array,required:!0}},methods:{},created:function(){},mounted:function(){}},o=n,s=a("2877"),c=Object(s["a"])(o,l,r,!1,null,"145a1096",null);e["a"]=c.exports},a535:function(t,e,a){"use strict";a.r(e);var l=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("basic-header",{attrs:{items:["销售管理","订单管理"]}}),a("el-card",[a("el-tabs",{model:{value:t.activeName,callback:function(e){t.activeName=e},expression:"activeName"}},[a("el-tab-pane",{attrs:{label:"已支付",name:"step1"}},[a("el-table",{attrs:{data:t.data1}},[a("el-table-column",{attrs:{label:"id",prop:"id",width:"100"}}),a("el-table-column",{attrs:{label:"订单号",prop:"order_id",width:"100"}}),a("el-table-column",{attrs:{label:"用户昵称",prop:"nickName",width:"100"}}),a("el-table-column",{attrs:{label:"配送地址",width:"100"},scopedSlots:t._u([{key:"default",fn:function(e){return[t._v(" "+t._s(e.row.province+e.row.city+e.row.area+e.row.detail)+" ")]}}])}),a("el-table-column",{attrs:{label:"收货人",prop:"name",width:"100"}}),a("el-table-column",{attrs:{label:"联系电话",prop:"phone",width:"100"}}),a("el-table-column",{attrs:{label:"订单总价",prop:"total",width:"100"}}),a("el-table-column",{attrs:{label:"订单备注",prop:"backup",width:"100"}}),a("el-table-column",{attrs:{label:"创建时间",prop:"create_time",width:"100"}}),a("el-table-column",{attrs:{label:"操作",width:"200"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{type:"text"}},[t._v("查看详情")]),a("el-button",{attrs:{type:"text"}},[t._v("确认发货")])]}}])})],1)],1),a("el-tab-pane",{attrs:{label:"已发货",name:"step2"}}),a("el-tab-pane",{attrs:{label:"已完成",name:"step3"}})],1)],1)],1)},r=[],n=a("0418"),o={data:function(){return{activeName:"step1",data1:[],data2:[],data3:[],data4:[],api:"/api/orders/orders"}},methods:{fetchData:function(){var t=this;this.axios.get(this.api,{params:{state:1}}).then((function(e){200===e.data.code&&(t.data1=e.data.data)}))}},components:{"basic-header":n["a"]},created:function(){this.fetchData()},mounted:function(){}},s=o,c=a("2877"),i=Object(c["a"])(s,l,r,!1,null,"04d32d72",null);e["default"]=i.exports}}]);
//# sourceMappingURL=chunk-09b2ceb4.7db877cc.js.map