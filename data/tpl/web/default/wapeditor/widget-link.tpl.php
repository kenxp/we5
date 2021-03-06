<?php defined('IN_IA') or exit('Access Denied');?><div ng-controller="linkCtrl">
<?php  if($_GPC['iseditor']) { ?>
	<!--文本导航-->
	<div class="app-textNav-edit">
		<div class="arrow-left"></div>
		<div class="inner">
			<div class="panel panel-default">
				<div class="panel-body form-horizontal">
					<div class="card add-textNav-con" ng-repeat="item in activeItem.params.items">
						<div class="btns">
							<a href="javascript:" ng-click="addItem()"><i class="fa fa-plus"></i></a>
							<a href="javascript:" ng-click="removeItem(item)"><i class="fa fa-times"></i></a>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-3"><span class="red">*</span> 数据来源</label>
							<div class="col-xs-9">
								<label class="radio-inline">
									<input type="radio" value="1" ng-model="item.type" name="link-type-{{$index+0}}">分类
								</label>
								<label class="radio-inline">
									<input type="radio" value="2" ng-model="item.type" name="link-type-{{$index+0}}">自定义
								</label>
							</div>
						</div>
						<div class="form-group" ng-show="item.type == 2">
							<label class="control-label col-xs-3"><span class="red">*</span> 导航名称</label>
							<div class="col-xs-9">
								<input type="text" class="form-control" name="" ng-class="{'red': item.title == ''}" ng-model="item.title">
							</div>
						</div>
						<div class="form-group" ng-show="item.type == 2">
							<label class="control-label col-xs-3"><span class="red">*</span> 链接到</label>
							<div class="col-xs-9 form-control-static ">
								<div ng-my-linker ng-my-url="item.url" ng-my-title="item.title"></div>
							</div>
						</div>
						<div class="form-group" ng-show="item.type == 1">
							<label class="control-label col-xs-3"><span class="red">*</span>内容来源</label>
							<div class="col-xs-9 ">
								<div class="input-group">
									<!--链接选择好以后显示以下内容-->
									<div class="form-control-static ">
										<label ng-if="item.selectCate.id != 0" class="label label-success">{{item.selectCate.name}}</label>
										<a href="javascript:;" ng-click="showSearchCateList(item)"><span ng-if="item.selectCate.id == 0">从分类中选择</span><span ng-if="item.selectCate.id != 0">修改</span></a>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group" ng-show="item.type == 1">
							<label class="control-label col-xs-3">文章属性</label>
							<div class="col-xs-9">
								<label class="checkbox-inline">
									<input type="checkbox" ng-model="item.isnew" value="1" name="attribute">最新
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" ng-model="item.iscommend" value="1"  name="attribute"/>推荐
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" ng-model="item.ishot" value="1" name="attribute"/>头条
								</label>
							</div>
						</div>
						<div class="form-group" ng-show="item.type == 1">
							<label class="control-label col-xs-3">显示条数</label>
							<div class="col-xs-9 ">
								<select class="form-control" ng-model="item.pageSize" ng-change="changePageSize(item)">
									<option value="1">1条</option>
									<option value="2">2条</option>
									<option value="3">3条</option>
									<option value="4">4条</option>
									<option value="5">5条</option>
									<option value="10">10条</option>
									<option value="15">15条</option>
									<option value="20">20条</option>
									<option value="30">30条</option>
								</select>
							</div>
						</div>
					</div>
					<div class="add-textNav card">
						<a href="javascript:" ng-click="addItem()"><i class="fa fa-plus-circle green"></i>  添加一个导航</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end文本导航-->
	<div id="modal-search-cate-link" class="modal fade in" role="dialog" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">+</button>
					<h3>选择分类</h3>
				</div>
				<div class="modal-body">
					<table class="table table-hover">
							<thead class="navbar-inner">
								<tr>
									<th style="width:60%;">标题</th>
									<th style="width:30%; text-align:right">
										<div class="input-group input-group-sm">
											<input type="text" class="form-control">
											<span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
											</span>
										</div>
									</th>
								</tr>
							</thead>
							<tbody ng-repeat="pcate in searchCateList">
								<tr>
									<td><a href="#">{{pcate.name}}</a></td>
									<td class="text-right"><a class="btn btn-default btn-sm" ng-click="selectCateItem(pcate.id, 0, pcate.name)">选取</a></td>
								</tr>
								<tr ng-repeat="ccate in pcate.children track by $index">
									<td style="padding-left:50px;height:30px;line-height:30px;background-image:url('./resource/images/bg_repno.gif'); background-repeat:no-repeat; background-position: -245px -540px;"><a href="#">{{ccate.name}}</a></td>
									<td class="text-right">
										<a class="btn btn-default btn-sm" ng-click="selectCateItem(0, ccate.id, ccate.name)">选取</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php  } else { ?>
	<!--app关联链接-->
	<div class="app-link js-default-content" ng-if="module.params.items.length == 0">
		<div class="inner">
			<div class="list-group">
				<div class="list-group-item">
					<a class="clearfix" href="javascript:;">
						<span class="app-nav-title">点此编辑第1条『关联链接』<i class="pull-right fa fa-angle-right"></i></span>
					</a>
				</div>
				<div class="list-group-item">
					<a class="clearfix" href="javascript:;">
						<span class="app-nav-title">点此编辑第2条『关联链接』<i class="pull-right fa fa-angle-right"></i></span>
					</a>
				</div>
				<div class="list-group-item">
					<a class="clearfix" href="javascript:;">
						<span class="app-nav-title">点此编辑第n条『关联链接』<i class="pull-right fa fa-angle-right"></i></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div ng-if="module.params.items.length != 0">
		<!--app文本导航-->
		<div class="app-textNav">
			<div class="inner">
				<div class="list-group">
					<div ng-repeat="item in module.params.items">
						<div ng-if="item.type == '1' && (item.selectCate.pid > 0 || item.selectCate.cid > 0)">
							<div class="list-group-item" ng-repeat="i in pageSize | limitTo:item.pageSize">
								<a class="clearfix" href="javascript:;">
									<span class="app-nav-title"> 第{{$index+1}}条 {{item.selectCate.name}} 的『关联链接』<i class="pull-right fa fa-angle-right"></i></span>
								</a>
							</div>
						</div>
						<div class="list-group-item" ng-if="item.type == '2'">
							<a class="clearfix" href="{{item.url}}">
								<span class="app-nav-title"> {{item.title}} <i class="pull-right fa fa-angle-right"></i></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end文本导航-->
	</div>
<?php  } ?>
</div>