<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<ol class="breadcrumb">
	<li><a href="./?refresh"><i class="fa fa-home"></i></a></li>
	<li><a href="<?php  echo url('system/welcome');?>">系统</a></li>
	<li class="active">系统信息</li>
</ol>
<div class="main">
	<div class="panel panel-info">
		<div class="panel-heading">用户信息</div>
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<tr>
				<th style="width:250px;">用户ID</th>
				<td><?php  echo $info['uid'];?></td>
			</tr>
			<tr>
				<th>当前公众号</th>
				<td><?php  echo $info['account'];?></td>
			</tr>
		</table>
		</div>
	</div>
	
	<div class="panel panel-info">
		<div class="panel-heading">系统信息</div>
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<tr>
				<th style="width:250px;">程序版本</th>
				<td>version1.0</td>
			</tr>
			<tr>
				<th>产品系列</th>
				<td><?php  if(IMS_FAMILY == 'v') { ?>
						您的产品是商业版
					<?php  } else { ?>
						您的产品是商业版
					<?php  } ?>
				</td>
			</tr>
			<tr>
				<th>服务器系统</th>
				<td><?php  echo $info['os'];?></td>
			</tr>
			<tr>
				<th>PHP版本 </th>
				<td>PHP Version <?php  echo $info['php'];?></td>
			</tr>
			<tr>
				<th>服务器软件</th>
				<td><?php  echo $info['sapi'];?></td>
			</tr>
			<tr>
				<th>服务器 MySQL 版本</th>
				<td><?php  echo $info['mysql']['version'];?></td>
			</tr>
			<tr>
				<th>上传许可</th>
				<td><?php  echo $info['limit'];?></td>
			</tr>
			<tr>
				<th>当前数据库尺寸</th>
				<td><?php  echo $info['mysql']['size'];?></td>
			</tr>
			<tr>
				<th>当前附件根目录</th>
				<td><?php  echo $info['attach']['url'];?></td>
			</tr>
			<tr>
				<th>当前附件尺寸</th>
				<td><?php  echo $info['attach']['size'];?></td>
			</tr>
		</table>
		</div>
	</div>

	<?php  if($_W['isfounder']) { ?>
		<div class="panel panel-info">
			<div class="panel-heading">开发团队</div>
			<div class="panel-body table-responsive">
			<table class="table table-hover">
				<tr>
					<th style="width:250px;">版权所有</th>
					<td><a href="http://www.heitoy.com/" target="_blank"><b>墨阳</b></a></td>
				</tr>
				<tr>
					<th>团队成员</th>
					<td>
						<a href="http://www.heitoy.com/" class="lightlink2 smallfont" target="_blank">墨阳</a>
						<a href="http://www.hnuahe.edu.cn/" class="lightlink2 smallfont" target="_blank">崔先雨</a>
				</tr>
					<tr>
					<th>官方交流群</th>
					<td><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=34756efde129a4e3ebcec19320200e936df4d87bba41bdadcffd1fc153092c34"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="微信公众平台开发交流" title="微信公众平台开发交流"></a></td>
				</tr>
				<tr>
					<th>相关链接</th>
					<td>
						<a href="http://www.heitoy.com/" class="lightlink2" target="_blank">公司网站</a>
						<a href="http://www.heitoy.com/" class="lightlink2" target="_blank">购买授权</a>
					</td>
				</tr>
			</table>
			</div>
		</div>
	<?php  } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-gw', TEMPLATE_INCLUDEPATH));?>
