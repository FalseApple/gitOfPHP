package Other;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;

import org.apache.commons.codec.StringEncoder;
import org.apache.http.Consts;
import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.client.utils.URLEncodedUtils;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.CloseableHttpClient;
import org.apache.http.impl.client.HttpClientBuilder;
import org.apache.http.impl.client.LaxRedirectStrategy;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;
import org.eclipse.swt.SWT;
import org.eclipse.swt.events.SelectionAdapter;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.layout.RowLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Display;
import org.eclipse.swt.widgets.Shell;

public class Login_first
{
	public static void main(String[] args)
	{
		// TODO Auto-generated method stub
	    Display display = new Display();
	    Shell shell = new Shell(display);
	    shell.setSize(300, 200);
	    shell.setText("login Example");
	    shell.setLayout(new RowLayout());

	    CloseableHttpClient httpClient = HttpClientBuilder.create().build();
	    
	    final Button button = new Button(shell, SWT.PUSH);
	    button.setText("登入");

	    final Button button1 = new Button(shell, SWT.PUSH);
	    button1.setText("註冊");
	    
	    final Button button2 = new Button(shell, SWT.PUSH);
	    button2.setText("修改");
	    
	    final Button button5 = new Button(shell, SWT.PUSH);
	    button5.setText("修改者1進入");
	    
	    final Button button4 = new Button(shell, SWT.PUSH);
	    button4.setText("修改者1修改");
	    
	    final Button button3 = new Button(shell, SWT.PUSH);
	    button3.setText("刪除");

	    final Button button6 = new Button(shell, SWT.PUSH);
	    button6.setText("登出");	    

	    // 登入
	    button.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				try {
					 //CloseableHttpClient httpClient = HttpClientBuilder.create().build();
					// 登入頁面
					HttpPost httpPost = new HttpPost("http://10.0.1.95/yueh_php/CI/index.php/Login/loginResponse");
					// post 的資料
					ArrayList<NameValuePair> arrayList = new ArrayList<NameValuePair>();
					arrayList.add(new BasicNameValuePair("account", "admin"));
					arrayList.add(new BasicNameValuePair("pass", "1121"));
					
					// 設定eneity
					httpPost.setEntity(new UrlEncodedFormEntity(arrayList, Consts.UTF_8));
					
					HttpResponse httpResponse = httpClient.execute(httpPost);
					
					int iStatusCode = httpResponse.getStatusLine().getStatusCode();
					HttpEntity httpEntity = httpResponse.getEntity();
					System.out.println("CODE: " + iStatusCode);
					if(iStatusCode == 200)
					{
						System.out.println(EntityUtils.toString(httpEntity, "UTF-8"));
					}
				} catch (UnsupportedEncodingException e1) {
					e1.printStackTrace();
				} catch (ClientProtocolException e1) {
					e1.printStackTrace();
				} catch (IOException e1) {
					e1.printStackTrace();
				}
			}
		});
	    // 註冊
	    button1.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				try {
					CloseableHttpClient httpClient = HttpClientBuilder.create().build();
					// 登入頁面
					HttpPost httpPost = new HttpPost("http://10.0.1.95/yueh_php/CI/index.php/Register_finish/RegisterAccount");
					// post 的資料
					ArrayList<NameValuePair> arrayList = new ArrayList<NameValuePair>();
					arrayList.add(new BasicNameValuePair("regName", "adminner"));
					arrayList.add(new BasicNameValuePair("regAccount", "ajjas1"));
					arrayList.add(new BasicNameValuePair("regPass", "1111"));
					arrayList.add(new BasicNameValuePair("regPass2", "1111"));
					// 設定eneity
					httpPost.setEntity(new UrlEncodedFormEntity(arrayList, Consts.UTF_8));
					
					HttpResponse httpResponse = httpClient.execute(httpPost);
					
					int iStatusCode = httpResponse.getStatusLine().getStatusCode();
					HttpEntity httpEntity = httpResponse.getEntity();
					System.out.println("CODE: " + iStatusCode);
					if(iStatusCode == 200)
					{
						System.out.println(EntityUtils.toString(httpEntity, "UTF-8"));
					}
					
					httpClient.close();
				} catch (UnsupportedEncodingException e1) {
					e1.printStackTrace();
				} catch (ClientProtocolException e1) {
					e1.printStackTrace();
				} catch (IOException e1) {
					e1.printStackTrace();
				}
			}
		});
	    // 修改
	    button2.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				try {

					// 登入頁面
					HttpPost httpPost = new HttpPost("http://10.0.1.95/yueh_php/CI/index.php/Modify_finish/modify/2");
					// post 的資料
					ArrayList<NameValuePair> arrayList = new ArrayList<NameValuePair>();
					arrayList.add(new BasicNameValuePair("modifyPass", "111"));
					arrayList.add(new BasicNameValuePair("modifyPass2", "111"));
					// 設定eneity
					httpPost.setEntity(new UrlEncodedFormEntity(arrayList, Consts.UTF_8));
					
					HttpResponse httpResponse = httpClient.execute(httpPost);
					
					int iStatusCode = httpResponse.getStatusLine().getStatusCode();
					HttpEntity httpEntity = httpResponse.getEntity();
					System.out.println("CODE: " + iStatusCode);
					if(iStatusCode == 200)
					{
						System.out.println(EntityUtils.toString(httpEntity, "UTF-8"));
					}
					
				} catch (UnsupportedEncodingException e1) {
					e1.printStackTrace();
				} catch (ClientProtocolException e1) {
					e1.printStackTrace();
				} catch (IOException e1) {
					e1.printStackTrace();
				}
			}
		});
	    // 刪除
	    button3.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				try {
					//CloseableHttpClient httpClient = HttpClientBuilder.create().build();
					// 登入頁面
					HttpPost httpPost = new HttpPost("http://10.0.1.95/yueh_php/CI/index.php/Modify_finish/UserDeleteInfo");
					// post 的資料
					ArrayList<NameValuePair> arrayList = new ArrayList<NameValuePair>();
					arrayList.add(new BasicNameValuePair("MasterModifyUser", "CC"));
					// 設定eneity
					httpPost.setEntity(new UrlEncodedFormEntity(arrayList, Consts.UTF_8));
					
					HttpResponse httpResponse = httpClient.execute(httpPost);
					
					int iStatusCode = httpResponse.getStatusLine().getStatusCode();
					HttpEntity httpEntity = httpResponse.getEntity();
					System.out.println("CODE: " + iStatusCode);
					if(iStatusCode == 200)
					{
						System.out.println(EntityUtils.toString(httpEntity, "UTF-8"));
					}
					
					httpClient.close();
				} catch (UnsupportedEncodingException e1) {
					e1.printStackTrace();
				} catch (ClientProtocolException e1) {
					e1.printStackTrace();
				} catch (IOException e1) {
					e1.printStackTrace();
				}
			}
		});
	    // 修改者1進入
	    button4.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				try {
					//CloseableHttpClient httpClient = HttpClientBuilder.create().build();
					// 登入頁面
					HttpPost httpPost = new HttpPost("http://10.0.1.95/yueh_php/CI/index.php/Modify_finish/UserModify");
					// post 的資料
					ArrayList<NameValuePair> arrayList = new ArrayList<NameValuePair>();
					arrayList.add(new BasicNameValuePair("MasterModifyUser", "XXX"));
					// 設定eneity
					httpPost.setEntity(new UrlEncodedFormEntity(arrayList, Consts.UTF_8));
					
					HttpResponse httpResponse = httpClient.execute(httpPost);
					
					int iStatusCode = httpResponse.getStatusLine().getStatusCode();
					HttpEntity httpEntity = httpResponse.getEntity();
					System.out.println("CODE: " + iStatusCode);
					if(iStatusCode == 200)
					{
						System.out.println(EntityUtils.toString(httpEntity, "UTF-8"));
					}
					
				} catch (UnsupportedEncodingException e1) {
					e1.printStackTrace();
				} catch (ClientProtocolException e1) {
					e1.printStackTrace();
				} catch (IOException e1) {
					e1.printStackTrace();
				}
			}
		});
	    // 修改者1修改
	    button4.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				try {
					//CloseableHttpClient httpClient = HttpClientBuilder.create().build();
					// 登入頁面
					HttpPost httpPost = new HttpPost("http://10.0.1.95/yueh_php/CI/index.php/Modify_finish/modify/3");
					// post 的資料
					ArrayList<NameValuePair> arrayList = new ArrayList<NameValuePair>();
					arrayList.add(new BasicNameValuePair("MasterModifyAccount", "XXX"));
					arrayList.add(new BasicNameValuePair("MasterModifyCompetence", "99"));
					arrayList.add(new BasicNameValuePair("MasterModifyName", "X	"));
					arrayList.add(new BasicNameValuePair("MasterModifyPass", "12345"));
					arrayList.add(new BasicNameValuePair("MasterModifyPass2", "12345"));
					// 設定eneity
					httpPost.setEntity(new UrlEncodedFormEntity(arrayList, Consts.UTF_8));
					
					HttpResponse httpResponse = httpClient.execute(httpPost);
					
					int iStatusCode = httpResponse.getStatusLine().getStatusCode();
					HttpEntity httpEntity = httpResponse.getEntity();
					System.out.println("CODE: " + iStatusCode);
					if(iStatusCode == 200)
					{
						System.out.println(EntityUtils.toString(httpEntity, "UTF-8"));
					}
					

				} catch (UnsupportedEncodingException e1) {
					e1.printStackTrace();
				} catch (ClientProtocolException e1) {
					e1.printStackTrace();
				} catch (IOException e1) {
					e1.printStackTrace();
				}
			}
		});
	    // 登出
	    button6.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				try {
					CloseableHttpClient httpClient = HttpClientBuilder.create().build();
					// 登入頁面
					HttpPost httpPost = new HttpPost("http://10.0.1.95/yueh_php/CI/index.php/Logout");
					// post 的資料
					ArrayList<NameValuePair> arrayList = new ArrayList<NameValuePair>();
					// 設定eneity
					httpPost.setEntity(new UrlEncodedFormEntity(arrayList, Consts.UTF_8));
					
					HttpResponse httpResponse = httpClient.execute(httpPost);
					
					int iStatusCode = httpResponse.getStatusLine().getStatusCode();
					HttpEntity httpEntity = httpResponse.getEntity();
					System.out.println("CODE: " + iStatusCode);
					if(iStatusCode == 200)
					{
						System.out.println(EntityUtils.toString(httpEntity, "UTF-8"));
					}
					
					httpClient.close();
				} catch (UnsupportedEncodingException e1) {
					e1.printStackTrace();
				} catch (ClientProtocolException e1) {
					e1.printStackTrace();
				} catch (IOException e1) {
					e1.printStackTrace();
				}
			}
		});	    
	    shell.open();
	    while (!shell.isDisposed()) {
	      if (!display.readAndDispatch())
	        display.sleep();
	    }
	    display.dispose();
	}

}
