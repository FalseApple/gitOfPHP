package HttpTest;

import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.Writer;
import java.net.URI;
import java.net.URISyntaxException;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpEntity;
import org.apache.http.NameValuePair;
import org.apache.http.ParseException;
import org.apache.http.client.methods.CloseableHttpResponse;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.client.utils.URIUtils;
import org.apache.http.client.utils.URLEncodedUtils;
import org.apache.http.entity.ContentProducer;
import org.apache.http.entity.ContentType;
import org.apache.http.entity.EntityTemplate;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.CloseableHttpClient;
import org.apache.http.impl.client.HttpClients;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;

// get傳遞方式
public class HttpTest_ex7 {
	public static void main(String[] args) throws ParseException, IOException,
			URISyntaxException {

		ContentProducer cp = new ContentProducer() {

			public void writeTo(OutputStream outstream) throws IOException {

				Writer writer = new OutputStreamWriter(outstream, "UTF-8");

				writer.write("<response>");

				writer.write("  <content>");

				writer.write("    important stuff");

				writer.write("  </content>");

				writer.write("</response>");

				writer.flush();

			}

		};

		HttpEntity entity = new EntityTemplate(cp);

		HttpPost httppost = new HttpPost("http://localhost/MyPHP/CI/index.php/Welcome");

		httppost.setEntity(entity);
		System.out.println(httppost);
		System.out.println(entity );
	}

}
